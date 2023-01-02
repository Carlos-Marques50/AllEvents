@extends("layout.main")
@section("title",$evento->nome_evento)

@section("content")

<!-- Main content -->
<section class="content">

    <!-- Default box -->
<div class="card card-solid">

    <div class="card-body">

        <br><br><br><br>
        <div class="row">

            <div class="col-12 col-sm-6">
                <div class="col-12">
                <img src="{{asset('img/eventos/'.$evento->imagem)}}" class="product-image" alt="Imagem do Evento">
                </div>
                
            </div>

            <div class="col-12 col-sm-6">
                <h3 class="my-3">{{$evento->nome_evento}}</h3>
                <div>
                    <p><ion-icon name="star"></ion-icon>{{ $DonoEvento["name"]}}</p>
                    <p><ion-icon name="location"></ion-icon> {{$evento["local"]}}</p>
                    <p><ion-icon name="people"></ion-icon> Participantes do Evento</p>
                </div>
                <br>
                <hr>

                <h4>O evento conta com:</h4>

                @foreach ($evento->itens as $item)
            
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-default text-center active"> {{$item}}</label>
                    </div>

                @endforeach


                <h4 class="mt-3">Concerto</h4>

                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                    <span class="text-xl">{{$evento->hora}}:00</span>
                    <br>
                Hora
                </label>
                <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                    <span class="text-xl">
                        @if($evento->tipo_evento==0) {{"Privado"}} @endif
                        @if($evento->tipo_evento==1) {{"Publico"}} @endif
                    </span>
                    <br>
                    Tipo de Evento
                </label>
                <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                    <span class="text-xl">{{$evento->sala}}</span>
                    <br>
                    Sala
                </label>
                <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                    <span class="text-xl">{{$evento->data_evento}}</span>
                    <br>
                    Data
                </label>
                </div>

                <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                    {{$evento->preço_evento}} Kz
                </h2>
                <h4 class="mt-0">
                    <small>Codigo do Evento: {{md5($evento->id)}} </small>
                </h4>
                </div>

                <div class="mt-4">
                    <button type="button"  class="btn btn-default btn-lg btn-flat">
                        <ion-icon name="checkmark-done"></ion-icon>
                        Confirmar Presença
                    </button>
                </div>

            </div>
        </div>

        <div class="row mt-4">
          <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
              <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Descrição do Evento</a>
     
            </div>
          </nav>
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                {{$evento->descricao}}
            </div>
            
          </div>
        </div>

    </div>
      <!-- /.card-body -->
</div>
    <!-- /.card -->

</section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection