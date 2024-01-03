@extends('layouts.admin')

@section('title', 'Puntos de Venta')

@section('cssExtras')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

@endsection

@section('styleExtras')

@endsection

@section('content')

<style>

@font-face {
        font-family: 'Neusharp Bold';
        font-style: normal;
        font-weight: normal;
        src: local('Neusharp Bold'), url({{ asset('fonts/Neusharp-Bold/NeusharpBold-7B8RV.woff') }}) format('woff');
    }

    .circulo-img {
        border: 2px solid #E40821;
        border-radius: 100%;
        padding: 1rem;
    }

    .texto-circulo {
        font-size: 1rem;
        color: var(--azul-titulos);
        font-weight: bold;
        margin-top: 1rem;
    }

    .categorias {
        background-color: transparent;
    }

    .slick-dots li button {
        padding: 0;
    }

    .slick-dots {
        margin-top: 10px;
    }

   
    /* Estilo para los puntos de cambio de slide */
    .slick-dots {
        display: flex;
        justify-content: center;
        background-color: white;
        align-items: center;
        list-style: none;
        padding: 1rem;
        margin-top: 2.6rem;
    }

    .slick-dots li {
        margin: 0 8px; /* Espacio entre los puntos */
    }

    .slick-dots li button {
        width: 14px;
        height: 14px;
        border: 1px solid var(--azul-titulos); /* Color de los puntos inactivos */
        /* border: none; */
        border-radius: 50%; /* Hace que los puntos sean circulares */
        cursor: pointer;
        text-indent: -9999px; /* Oculta el texto del botón al moverlo fuera del área visible */
        overflow: hidden; /* Oculta cualquier contenido que se desborde del área del botón */
    }


    .slick-dots li.slick-active button {
        border: 1px solid #f00;
        background-color: #f00; /* Color del punto activo */
    }
    
    .card {
        --bs-card-spacer-y: 0rem;
        --bs-card-spacer-x: 0rem;
    }

    @media(min-width: 1800px) {
        .slick-prev {
            margin-left: 36rem;
        }

        .slick-next {
            margin-right: 36rem;
        }

        .mapa {
            width: 100%;
            height: 56rem;
        }
    }

    /* xxl */
    @media (min-width: 1400px) and (max-width: 1799px) {
        .slick-prev {
            margin-left: 34rem;
        }

        .slick-next {
            margin-right: 34rem;
        }

        .mapa {
            width: 100%;
            height: 44rem;
        }
    }

    /* xl */
    @media (min-width: 1200px) and (max-width: 1400px) {
        .slick-prev {
            margin-left: 30rem;
        }

        .slick-next {
            margin-right: 30rem;
        }

        .mapa {
            width: 100%;
            height: 36rem;
        }
    }

    /* lg */
    @media (min-width: 992px) and (max-width: 1200px) {
        .slick-prev {
            margin-left: 24rem;
        }

        .slick-next {
            margin-right: 24rem;
        }

        .mapa {
            width: 100%;
            height: 36rem;
        }
    }

    /* md */
    @media (min-width: 768px) and (max-width: 992px) {
        .slick-prev {
            margin-left: 18rem;
        }

        .slick-next {
            margin-right: 18rem;
        }

        .mapa {
            width: 100%;
            height: 32rem;
        }
    }

    /* sm */
    @media (min-width: 576px) and (max-width: 768px) {
        .slick-prev {
            visibility: hidden;
        }

        .slick-next {
            visibility: hidden;
        }

        .mapa {
            width: 100%;
            height: 32rem;
        }
    }

    /* xs */
    @media (min-width: 0px) and (max-width: 576px) {
        .slick-prev {
            visibility: hidden;
        }

        .slick-next {
            visibility: hidden;
        }

        .mapa {
            width: 100%;
            height: 24rem;
        }
    }

</style>

<div class="container-fluid py-5">
    <div class="row mt-2">
        <div class="col text-center display-3 fw-bolder" style="color: var(--azul-titulos); font-family:'Neusharp Bold';">
            PUNTOS DE VENTA
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-11 col-xs-11 col-11 py-2 mx-auto text-center">
            <div class="col-12 mb-2 text-center"><i class="fa-solid fa-pencil" style="font-size: 1.5rem;"></i></div>
            <textarea class="col-12 text-center editar_text_seccion_global editarajax" data-id="{{$elements[0]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="4" style="border-radius: 10px; border:none; background: #ededed">{{$elements[0]->texto}}</textarea>
        </div>
    </div>
</div>
<section class="sub-categorias_tienda bg-white py-4 border-0">
    <div class="container-fluid">
        <div class="row py-4">
            <div class="col text-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Agregar punto de venta
                </button>
  
                <!-- Modal -->
                <div class="modal modal-lg fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar punto de venta</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('config.seccion.agpunto') }}" method="POST">
                                    @csrf
                                    <div class="row form-group py-2">
                                        <div class="col">
                                            <input type="text" name="direccion" class="form-control" placeholder="Dirección">
                                        </div>
                                    </div>
                                    <div class="row form-group py-2">
                                        <div class="col-4">
                                            <input type="number" name="codigo_postal" class="form-control" placeholder="Código Postal">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" name="municipio" class="form-control" placeholder="Municipio">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" name="estado" class="form-control" placeholder="Estado">
                                        </div>
                                    </div>
                                    <div class="row form-group py-2">
                                        <div class="col">
                                            <input type="text" name="mapa" class="form-control" placeholder="Link del mapa">
                                        </div>
                                    </div>
                                    <div class="row form-group py-2">
                                        <div class="col">
                                            <input type="submit" class="btn btn-info text-white shadow-0" value="Guardar cambios">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-white shadow">
            <div class="col-11 mx-auto">
                <div class="row py-3">
                    <div class="slider-nav">

                        @foreach ($puntos_venta as $pv)
                        <a href="#/" class="link-categoria filter-option" data-filter=".categoria-1" id="categoria-1" style="text-decoration: none; color: var(--azul-titulos);">
                            <div class="col position-relative py-3 mx-auto">
                                <div class="row">
                                    <div class="col-3 position-relative">
                                    </div>
                                    <div class="col-8 position-relative text-center">
                                        <div class="col-6 position-absolute top-50 start-0 translate-middle">
                                            <img src="{{ asset('img/design/punto_venta/punto_venta.png') }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control editarajax" data-table="PFPuntoVenta" data-campo="direccion" data-id="{{ $pv->id }}" value="{{ $pv->direccion }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="number" class="form-control editarajax" data-table="PFPuntoVenta" data-campo="codigo_postal" data-id="{{ $pv->id }}" value="{{ $pv->codigo_postal }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" class="form-control editarajax" data-table="PFPuntoVenta" data-campo="ciudad" data-id="{{ $pv->id }}" value="{{ $pv->ciudad }}">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" class="form-control editarajax" data-table="PFPuntoVenta" data-campo="estado" data-id="{{ $pv->id }}" value="{{ $pv->estado }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{route('config.seccion.elimpunto', ['punto' => $pv->id])}}" method="POST" class="col-12 text-center">
                                    @csrf
                                    <input type="text" name="id_proy" value="{{$pv->id}}" hidden>
                                    <style>
                                        .fa-trash:hover{
                                            opacity: 50%;
                                        }
                                    </style>
                                    <button class="col-12 text-center" style="background: none; border:none;">
                                        <i  class="fa-solid fa-trash my-3" style="font-size: 20px;"></i>
                                    </button>
                                </form>
                            </div>
                        </a>
                        @endforeach
                        
                        

               
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid">
    <div class="row bg-white">    
        <div class="col bg-white position-relative text-center slider-dots-container">
            {{-- <button class="slick-prev bg-white btn position-absolute start-0 mt-5"><img src="{{ asset('img/design/tienda/chev-le.png') }}" alt="" class="img-fluid"></button>     --}}
                <div class="slider-dots bg-white"></div>
            {{-- <button class="slick-next bg-white btn position-absolute end-0 mt-5"><img src="{{ asset('img/design/tienda/chev-ri.png') }}" alt="" class="img-fluid"></button> --}}
        </div>            
    </div>
</div>
<style>
    iframe {
        width: 100%;
    }
</style>
<div class="container-fluid mt-5 px-0">
    
    <div class="row">
        <div class="slider-for text-center">
            
            @foreach ($puntos_venta as $pvm)
                <div class="border">
                    {!! $pvm->mapa !!}
                </div>
            @endforeach
            
        </div>
    </div>
    
</div>

@endsection

@section('jqueryExtra')
<script>
    $('.slider-for').slick({
       slidesToShow: 1,
       slidesToScroll: 1,
       arrows: false,
       fade: true,
       asNavFor: '.slider-nav'
   });
   $('.slider-nav').slick({
       infinite: false,
       appendDots: $('.slider-dots-container'),
       slidesToShow: 3,
       slidesToScroll: 1,
       asNavFor: '.slider-for',
       prevArrow: '.slick-prev', // Selector del botón anterior
       nextArrow: '.slick-next', // Selector del botón siguiente
       dots: true,
       centerMode: false,
       focusOnSelect: true,
       responsive: [
       {
           breakpoint: 1300,
           settings: {
               slidesToShow: 3,
               slidesToScroll: 3,
               dots: true
           }
       },
       {
           breakpoint: 900,
           settings: {
               slidesToShow: 2,
               slidesToScroll: 2
           }
       },
       {
           breakpoint: 600,
           settings: {
               slidesToShow: 1,
               slidesToScroll: 1
           }
       }
       // You can unslick at a given breakpoint now by adding:
       // settings: "unslick"
       // instead of a settings object
       ]
   });
</script>
@endsection
