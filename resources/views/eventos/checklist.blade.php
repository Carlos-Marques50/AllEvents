@extends("layout.main")
@section("title", "Eventos Confirmados")
@section("content")


<br><br>
<div class="card-header">
    <h3> Eventos Confirados</h3>
</div>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Codigo do Evento</th>
        <th scope="col">Nome do Evento</th>
        <th scope="col">Data do Evento</th>
        <th scope="col">Proprietario do Evento</th>
      </tr>
    </thead>

    <tbody>
      @foreach($UsersEventos as $EventAtrelado)

      <tr>
        <th scope="row">{{$loop->index + 1}}</th>
        <td>{{md5($EventAtrelado["id"])}}</td>
    
        <td>{{$EventAtrelado["nome_evento"]}}</td>
        <td>{{$EventAtrelado["data_evento"]}}</td>
        
        <td>Proprietario do Evento </td>
        
        <td>
            <form action= "{{ route("unfollow")}}/{{$EventAtrelado["id"] }}" method="post">
                @csrf
                @method("delete")
                <button type="Submit" class="btn btn-info"><ion-icon name="close"></ion-icon>Desconfirmar</button>
              </form>
          </td>
      </tr>
       
      @endforeach
    </tbody>
  </table>



@endsection