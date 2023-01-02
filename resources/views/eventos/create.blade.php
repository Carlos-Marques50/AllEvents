@extends('layout.main')
@section("title","Criar Eventos")
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
    .msg_Erro{
        background-color: #e05040a7;
        color:#ffffff;
        border: 1px solid #c3e6cb;
        width: 100%;
        margin-bottom: 0;
        text-align: center;
        padding: 10px;
    }
</style>
<br>
<!-- form elements -->
<div class="card card-primary">

    <div class="card-header">
      <h3 class="card-title"> Criar Evento</h3>
    </div>
    <br>

    @if(session('msg_ErroSistema'))

      <h5 class="msg_Erro">
        {{session("msg_ErroSistema")}}
      </h5>

    @elseif(session('msg_Sucesso') )

      <h5 class="msg_Sucesso">
        {{session("msg_Sucesso")}}
      </h5>
    
    @elseif(session('msg_Erro') ) 

      <h5 class="msg_Erro">
        {{session("msg_Erro")}}
      </h5>

   @endif
   
    <!-- /.card-header -->

    <!-- form start -->
    <form action="{{route("story")}}" method="post" enctype="multipart/form-data">
       @csrf

      <div class="card-body">
        
       
        <div class="form-group">
          <label for="name_event">Evento</label>
          <input type="text" class="form-control" id="name_event" name="nome_evento" placeholder="Tema do Evento">
        </div>

        <div class="form-group">
          <label for="local">Local do evento</label>
          <input type="text" class="form-control" id="local" name="local_evento" placeholder="Localização do Evento">
        </div>

        <div class="form-group">
          <label for="sala_evento">Sala de Evento</label>
          <input type="number" class="form-control" id="sala_evento" name="sala" placeholder="Digita a Sala do Evento">
        </div>

        <div class="form-group">
          <label for="hora_evento">Hora</label>
          <input type="number" class="form-control" id="hora_evento" name="hora" placeholder="Digita hora do Evento">
        </div>

        <div class="form-group">
          <label for="data">Data do Evento</label>
          <input type="date" class="form-control" id="data" name="data" placeholder="Digita quando sera o Evento">
        </div>

        <div class="form-group">
          <label for="desc">Descrição</label>
          <input type="text" class="form-control" id="desc" name="descricao" placeholder="Descreve o Evento">
        </div>

        
            Tipo de Evento:
            <Select id="tipo_evento" name="tipo_evento">
                <option value="1">PÚBLICO</option>
                <option value="0" selected>PRIVADO</option>
            </Select>

            <div class="form-group">
              <label for="preço">Preço do Evento:</label>
              <input type="number" class="form-control" id="preço" name="preco" placeholder="Ex:20.000">
            </div>
    
            <br><br>
                      
            Itens dos Evento: <br>
          <input type="Checkbox" id="musica" name="itens[]" value="Música">
          <label for="musica">Música</label>
      
          <input type="Checkbox"  id="palco" name="itens[]" value="Palco">
          <label for="palco">Palco</label>
        
          <input type="Checkbox" id="alimentacao" name="itens[]" value="Alimentação">
          <label for="alimentacao">Alimentação</label>

          <input type="Checkbox" id="certificado" name="itens[]" value="Certificado">
          <label for="certificado">Certificados</label>
      

        <div class="form-group">
          <label for="file">Imagem do Evento</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="file" name="imagem">
              <label class="custom-file-label" for="file">Carregue a imagem do Evento</label>
            </div>
          </div>
        </div>
      
      </div>    
       
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Publicar Evento</button> 
      </div>

    </form>
  </div>
  <!-- /.card -->

@endsection