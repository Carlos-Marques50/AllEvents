@extends('layout.main')
@section("title","Meus Eventos")
@section("content")

<style>
  .msg_Sucesso{
    background-color: #d4edda;
    color:#155724;
    border: 1px solid #c3e6cb;
    width: 100%;
    margin-bottom: 0;
    text-align: center;
    padding: 10px;
  }
</style>
<br><br><br>

  @if(session("msg_delete"))
    <h5 class="msg_Sucesso">
      {{session("msg_delete")}}
    </h5>
  @elseif(session("msg_edit"))
    <h5 class="msg_Sucesso">
      {{session("msg_edit")}}
    </h5>
@endif

<div class="card-header">
  <h1> Meus Eventos </h1>
</div>

@if(!empty($MeusEventos) && count($MeusEventos)>0)

  <table class="table table-striped"> 

      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Codigo do Evento</th>
          <th scope="col">Nome do Evento</th>
          <th scope="col">Data de Criação</th>
          <th scope="col">Data do Evento</th>
          <th scope="col">Número de Participantes</th>
          <th scope="col">Custo do Evento</th>
        </tr>
      </thead>
      
    
      <tbody>
        
        @foreach ($MeusEventos as $Evento)
        <tr>  
            <th scope="row">{{$loop->index + 1}}</th>
            <td><a href="detalhes/{{$Evento->id}}">{{md5($Evento->id)}}</a></td>
            <td><a href="detalhes/{{$Evento->id}}">{{$Evento->nome_evento}}</a></td>
            <td>{{$Evento->updated_at}}</td>
            <td>{{$Evento->data_evento}}</td>
            <td>{{"# # # # # #"}}</td>
            <td>{{$Evento->preço_evento}} Kz</td>
            <td>
              <a href="editar/{{$Evento->id}}" class="btn btn-primary"><ion-icon name="create-outline"></ion-icon>Editar</a>
            </td>
            <td>
              <form action= "{{$Evento->id}}" method="post">
                @csrf
                @method("delete")
                <button type="Submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon>Apagar</button>
              </form>
            </td>
          
        </tr>
        @endforeach

      </tbody>
    
    </table>

@else

<div class="card-header">
  <h3 class="card-title"> Você ainda não tem eventos, <a href="{{route("create")}}">Criar evento</a> </h3>
</div>

@endif

@endsection