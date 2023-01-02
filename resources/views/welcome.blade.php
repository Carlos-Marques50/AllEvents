@extends('layout.main')
@section("title","AllEvents-Home")

@section('content')
    
<h3 class="mt-4 mb-4">
  @if ($busca)
  <h3>Buscando por: {{$busca}}</h3>
  @else
  <h3>Próximos eventos</h3>
  @endif
</h3>
        <h5 class="mb-2">Veja os eventos dos proximos dias.</h5>

        <hr>
          <!-- ========================================================= -->

          @if (count($eventos)==0 && $busca)
            <h3>Busca não encontrada...</h3>
          @elseif(count($eventos)==0)
            <h3>Sem Evento Para Exibir...</h3>
          @endif

        <div class="row">

         
          @foreach ($eventos as $evento)


          <div class="col-md-4">
            <a href='eventos/detalhes/{{$evento->id}}'> 
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user shadow-lg">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white"
                   style="background: url('img/eventos/{{$evento->imagem}}') center center;">
                <h3 class="widget-user-username text-right" style="color: black">{{$evento->nome_evento}}</h3>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="dist/img/user3-128x128.jpg" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header" style="color: black">Sala</h5>
                      <span class="description-text" style="color: black">{{ $evento->sala }}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header" style="color: rgba(0, 0, 0, 0.836)">Tipo de Evento</h5>
                      <span class="description-text" style="color: black">
                        @if($evento->tipo_evento==0) {{"Privado"}} @endif
                        @if($evento->tipo_evento==1) {{"Publico"}} @endif
                      </span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header" style="color: black">Hora</h5>
                      <span class="description-text" style="color: black">{{ $evento->hora }}h</span>
                    </div>
                   
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div> 
                <a href='eventos/detalhes/{{$evento->id}}' class="link-primary">Detalhes do Evento...</a>
                <!-- /.row -->
              </div>
              </a>
            </div>
            <!-- /.widget-user -->
            
          </div>
          <!-- /.col -->
          
          @endforeach

        </div>
        <!-- /.row -->

       
    
@endsection      