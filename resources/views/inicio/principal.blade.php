@extends('cabecera.cab')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            @include('sweet::alert')
            <!-- Carousel inicio  -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                    <img class="d-block img-fluid imagen-carousel" src="/imagen/consultorio-1.jpg" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block img-fluid imagen-carousel" src="/imagen/consultorio-2.png" alt="Second slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- Carousel fin  -->
            <br><hr>

            <div class="col-md-12 panel1 panel-default">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-md-12 panel3 panel-default">
                      <h1 align="center">Último Post</h1>
                        <h2 class="blog-post-title texto-post">{{ $blog->titulo }}</h2>
                        <p class="blog-post-meta texto-post">{{ date('M j,Y', strtotime($blog->created_at)) }} by <a href="#">{{ $blog->name }}</a></p>
                        <p class="texto-post">{{ substr(strip_tags($blog->descripcion),0,75) }}{{ strlen(strip_tags($blog->descripcion)) > 75 ? '...' :"" }}</p>
                        <div class="col-md-4" align="right">
                            <a class="btn btn-outline-primary" href="{{ route('seguir_leyendo') }}">Seguir Leyendo...</a>
                        </div>
                        <br>
                    </div>
                </div>
            </div><!-- /.blog-main -->
            <br>
        </div>
    </div>
</div>
 <script type="text/javascript">
        function noback(){
           window.location.hash="no-back-button";
           window.location.hash="Again-No-back-button"
           window.onhashchange=function(){window.location.hash="no-back-button";}
        }
    </script>
@endsection
