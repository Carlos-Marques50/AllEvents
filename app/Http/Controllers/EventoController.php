<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Else_;
use PhpParser\Node\Stmt\Goto_;

class EventoController extends Controller
{

    //Metodo pagina principal
    public function index(Request $request){
        $busca= $request['search'];
        if ($busca) {
            $eventos= Evento::where( "nome_evento", "like", "%$busca%")->get();
        }
        $eventos= Evento::all();
        return view( "welcome",compact("eventos","busca") ); 
    }

    //Metodo redirect para formulario de criação de noticias
    public function create(){
        return view("eventos/create");
    }

    //Metodo Principal de Inserção de Dados no DB
    public function store(Request $request){ 
        
        $evento= new Evento(); //Instancia da Class Model(Evento)

        // Tranformando número em string (Tipo de Evento)
        if($request->tipo_evento==0){
            $TipoEvento= "Privado";
        }else{
            $TipoEvento= "Publico";
        }

        //Confição de Erro ao inserir os dados no DB
        if( 
            $request->nome_evento && 
            $request->sala && $TipoEvento && $request->hora && 
            $request->imagem && $request->local_evento && 
            $request->data && $request->descricao && $request->preco &&
            $request->itens
            ){

            //UPLOAD de Imagem
            if( $request->hasfile("imagem") && $request->file("imagem")->isValid()){

                //Tratamento do UPLOAND de Imagem
                $requestImagem= $request->imagem; //Copia da Variavel
                $Extensao=  $requestImagem->extension(); //Puxamos a extenção do arquivo
                $imagemName=md5( $requestImagem->getClientOriginalName().strtotime("now") ).".".$Extensao; //Criptogravamos e renomeiamos o arquivo
                $caminho=public_path("img/eventos"); //Demos caminho para guardar o arquivo carregado
                $requestImagem->move($caminho,$imagemName); //movemos ate ao camingo que demos na linha anterior
            
                //Insersão de dados no Banco
                $evento->nome_evento= $request->nome_evento;
                $evento->sala =       $request->sala;
                $evento->tipo_evento= $request->tipo_evento;
                $evento->hora=        $request->hora;
                $evento->imagem=      $imagemName;
                $evento->local=       $request->local_evento;
                $evento->data_evento= $request->data;
                $evento->descricao=   $request->descricao;
                $evento->preço_evento=$request->preco;
                $evento->itens=       $request->itens;

                $user= auth()->user();
                $evento->user_id= $user["id"];

                if($evento->save()){

                    //Retorna Sucesso
                    $msg="Evento Criando com Sucesso...";
                    return Redirect("eventos/create")->with("msg_Sucesso",$msg);

                }else{
                    goto mensagem_erro;
                }

            }

            mensagem_erro:
            //Retorna Erro
            $msg="Lamento! Erro no Sistema, Por favor tente mas tarde... ";
            return Redirect("eventos/create")->with("msg_ErroSistema",$msg);

        } else{

            //Retorna Erro
            $msg="Por favor! Preencha todos os campos para criar o seu evento";
            return Redirect("eventos/create")->with("msg_Erro",$msg);
        }
 
    }

    //Metodo que mostra os detalhes do Evento
    public function show(int $id){
        $evento= Evento::FindOrFail($id);
        $DonoEvento= User::where('id', $evento['user_id'] )->firstOrFail(); 
        return view("eventos/detalhes", compact("evento","DonoEvento") );
    }

    //Metodo para o Dashboard
    public function dashboard(){
        $user= auth()->user();
        $MeusEventos= $user->eventos;
        return view("eventos/dashboard", compact("MeusEventos"));
    }

    //Metodo que Faz Logoout do user
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    //Metodo para deletar Evento no DB
    public function destroy($id){
        Evento::findOrFail($id)->firstOrFail()->delete();
        $msg="Evento excluido com sucesso!";
        return Redirect(route("dashboard"))->with("msg_delete",$msg);
    }

    //Metodo para deletar Evento no DB
    public function edit($id){

        $EditarEvento= Evento::FindOrFail($id);
        return view("eventos/editar",compact("EditarEvento") );
    }

    public function update(Request $request){

        $data= $request->all();

        //UPLOAD de Imagem
        if($request->hasfile("imagem") && $request->file("imagem")->isValid()){

            $requestImagem=$request->imagem;
            $Extensao= $requestImagem->extension(); 
        
            $NameNewImagem=md5( $requestImagem->getClientOriginalName().strtotime("now") ).".".$Extensao; //Criptogravamos e renomeiamos o arquivo
            $requestImagem->move(public_path("img/eventos"), $NameNewImagem);//movemos ate ao camingo que demos na linha anterior
            
            $data['imagem']= $NameNewImagem; //Envia o nome da imagem no DataBase
           
        }

        Evento::FindOrFail($request->id)->update($data);
        $msg= "Evento editado com Sucesso...";
        return(redirect(route("dashboard"))->with("msg_edit",$msg) );
    }

}