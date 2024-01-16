@extends('layouts.front')

@section('title', 'Home')

@section('cssExtras')
    <link rel="stylesheet" href="{{ asset('css/front/index.css') }}">

@endsection

@section('styleExtras')
<style>
    @font-face {
        font-family: 'Sansation Bold';
        src: url("{{ asset('fonts/Sansation-Bold/Sansation_Bold.ttf') }}") format('truetype');
        font-weight: normal;
        font-style: normal;
    }
</style>
@endsection

@section('content')

    <section data-aos="fade-zoom-in"
     data-aos-easing="ease-in-back" 
     data-aos-delay="300"
     data-aos-offset="0" style="background-color: #201E1F;">
        <div class="container-fluid py-5" style="background-color: #201E1F;">
            <div class="row py-5">
                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-11 col-11 titulo-pri mx-auto fw-bold text-end titulo-index" style="font-family: 'Sansation Bold', sans-serif;">
                    {{ $elements[0]->texto }}RRRR
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-8 col-sm-11 col-11 py-4 mx-auto text-white texto-ind" style="font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bold;">
                    {{ $elements[1]->texto }}
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-8 col-sm-11 col-11 mx-auto">
                    <div class="row">
                        <div class="col-xxl-7 col-xl-8 col-lg-7 col-md-7 col-sm-9 col-12 mx-xxl-0 mx-xl-0 mx-lg-0 mx-md-0 mx-sm-auto mx-auto text-center">
                            <a href="{{ route('front.contact') }}" class="btn btn-outline py-3 fs-5 fw-bolder bg-white rounded-pill w-100 text-dark" style="font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; sans-serif; font-weight: bold;">
                                COTIZAR AQUÍ <svg xmlns="http://www.w3.org/2000/svg" height="1.4rem" width="3rem" fill="#FFC000" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section data-aos="fade-up" data-aos-anchor-placement="center-bottom"  style="background-color: #201E1F;">
        <div class="container-fluid mt-0">
            <div class="row">
                <div class="slider-principal px-0">
                    @foreach ($slider_principal as $sp)
                        <div class="col-12 imagen-slider" style="background-image: url('{{ asset('img/photos/slider_principal/'.$sp->slider) }}');"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section data-aos="zoom-in" data-aos-delay="500"  style="background-color: #201E1F; overflow: hidden;">
        <div class="container-fluid contenedor-serv py-5">
            <div class="row py-5">
                <div class="col-xxk-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mx-auto">
                    <div class="row">
                        <div class="col fw-bold display-2 text-white py-4 serv-ttt" style="font-family: 'Sansation Bold', sans-serif;">
                            Servicios
                        </div>
                    </div>
                    <div class="row" style="overflow: hidden;"> 
                        <div class="servicios">

                            @foreach ($servicios as $serv)
                            <div class="col-3" style="overflow: hidden;">
                                <div class="card position-relative carta border-0" style="background-color: {{  $serv->color  }}; overflow: hidden;">
                                    <div class="card-img-overlay" style="background-image: url('{{ asset('img/photos/servicios/'.$serv->imagen) }}'); overflow: hidden;">
                                    </div>
                                    <div class="card-body">
                                    {{--    <small class="card-orden">{{ $serv->orden }}</small> --}}
                                        <h3 class="card-title p-0 m-0" style="font-family: 'Sansation Bold', sans-serif;">{{ $serv->titulo }}</h3>
                                        <p class="card-text" style="font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; sans-serif; font-weight: bold;">
                                            {{ $serv->descripcion }}
                                        </p>
                                    </div>
                                    <div class="position-relative cont-btn">
                                        <div class="card bg-transparent border-0 ms-4 position-absolute bottom-0 start-0 translate-middle-y">
                                            <div class="row">
                                                <div class="col-xxl-4 link-servicio">
                                                    <a href="{{ route('front.servicio', ['id' => $serv->id]) }}" class="text-center  rounded-circle">
                                                        <img src="{{ asset('img/images/3my-imagetct2.png') }}" alt="right-up" class="img-fluid btn-serv rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12"></div>
                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-8 col-sm-10 col-xs-10 col-10 mx-xxl-0 mx-xl-0 mx-lg-0 mx-md-auto mx-sm-auto mx-auto slide-dotresp position-relative text-center slider-dots-container-pri">
                            <button class="slick-prev-pri btn position-absolute start-0" style="overflow: hidden"><img src="{{ asset('img/design/chevron-left.png') }}" alt="" class="img-fluid"></button>    
                            <div class="slider-dots"></div>
                            <button class="slick-next-pri btn position-absolute end-0" style="overflow: hidden"><img src="{{ asset('img/design/chrevron-right.png') }}" alt="" class="img-fluid"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section >
        <div class="container-fluid">
            <div class="row">
                <div class="col">

                </div>
            </div>
        </div>
    </section>

    <section data-aos="zoom-in">
        <div class="container-fluid mt-5 mb-5">
            <div class="row">
                <div class="col-12" style="background-color: #201E1F; margin: 0; padding: 0;">
                    <div class="column-container pb-5">
                        <div class="top-left"></div>
                        <div class="top-right"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col position-relative" style="background-color: #F0F0F0;">
                    
                    <div class="col position-absolute start-0 top-0 z-1" id="map"></div>
                    <div class="col-11 position-absolute start-0" id="container-visitas" style="margin-top: 40rem;">
                        <div class="row">
                            <div class="col-2 z-3 p-5" style="
                                background-color: #FE6E63;
                                border-top-right-radius: 32px;
                                border-bottom-right-radius: 32px;
                                width: 9rem;
                            ">
                                <div class="row">
                                    <div class="col-10" style="
                                        background-image: url('{{ asset('img/images/home/letrero2.png') }}');
                                        background-repeat: no-repeat;
                                        background-position: center center;
                                        background-size: contain;
                                        height: 20rem;
                                    ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 position-absolute cont-letrero" id="container-letrero">
                        <div class="row">
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-2 col-2 py-2"></div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 position-relative p-0 m-0 py-2 z-3">
                                <img src="{{ asset('img/images/home/contador.png') }}" alt="" class="img-fluid">
                                <div class="col-11 text-center position-absolute top-50 start-50 translate-middle" style="overflow: hidden;">
                                    <div class="row">
                                        <div class="col-9 fw-bolder text-center">
                                            <p id="contador_clientes" class="contad" style="font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; sans-serif; font-weight: bold;"></p>
                                        </div>
                                        <div class="col-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-2 col-2"></div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 fs-3 fw-bolder z-3" style="line-height: 1; color: #FE6E63;" style="font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; sans-serif; font-weight: bold;">
                                CIUDADES Y SEGUIMOS CRECIENDO
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-9 col-sm-11 col-11 position-relative mx-auto">
                            <div class="col-12 position-absolute top-0 start-50 translate-middle z-3" style="margin-top: 2rem;">
                                <div class="card" style="border-color: #ffffff; border-top-left-radius: 32px; border-top-right-radius: 32px; border-bottom-left-radius: 0px; border-bottom-right-radius: 32px; box-shadow: 0 0 30px rgba(0, 0, 0, 0.5); padding: 1rem;">
                                    <div class="card-body letrero" style="font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; sans-serif;">
                                        {{ $elements[5]->texto }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 position-absolute start-0 z-3" style="margin-top: 70rem; padding: 0;">
                        <div class="column-container2">
                            <div class="top-left2"></div>
                            <div class="top-right2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    </section>
    
    <section style="margin-top: 80rem;">
        <div class="container-fluid py-5">
            <div class="row py-5">
                <div class="col-11 position-relative mx-auto">
                    <div class="col-12 position-absolute">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" data-aos="zoom-in" data-aos-delay="100">
                                <div class="row">
                                    <div class="col-xxl-10 col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 position-relative mx-auto circulo-imagen" style="background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[8]->imagen) }}'); background-color: #CDE700;">
                                        <div class="col-11 ms-5 position-absolute top-0 start-0 mt-5">
                                            <h2><span><span style="font-family: 'Sansation Bold', sans-serif;">{{ $elements[7]->texto }}</span></span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-baja" data-aos="zoom-in" data-aos-delay="100"> 
                                <div class="row">
                                    <div class="col-xxl-10 col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 position-relative mx-auto circulo-imagen" style="background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[10]->imagen) }}'); background-color: #CCAEEC;">
                                        <div class="col-11 ms-5 position-absolute top-0 start-0 mt-5">
                                            <h2><span><span style="font-family: 'Sansation Bold', sans-serif;">{{ $elements[9]->texto }}</span></span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 position-absolute circulos-columan2">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" data-aos="zoom-in" data-aos-delay="100">
                                <div class="row">
                                    <div class="col-xxl-10 col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 position-relative mx-auto circulo-imagen" style="background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[12]->imagen) }}'); background-color: #FE6E63;">
                                        <div class="col-11 ms-5 position-absolute top-0 start-0 mt-5">
                                            <h2><span><span style="font-family: 'Sansation Bold', sans-serif;">{{ $elements[11]->texto }}</span></span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-baja" data-aos="zoom-in" data-aos-delay="100">
                                <div class="row">
                                    <div class="col-xxl-10 col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 position-relative mx-auto circulo-imagen" style="background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[14]->imagen) }}'); background-color: #A2E9FF;">
                                        <div class="col-11 ms-5 position-absolute top-0 start-0 mt-5">
                                            <h2><span><span style="font-family: 'Sansation Bold', sans-serif;">{{ $elements[13]->texto }}</span></span></h2>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="row texto-abajo">
            <div class="col-8 position-relative text-center mx-auto py-5 fs-3" style="line-height: 1;">
                
            </div>
        </div>
    </section>

    <section>
        <div class="container pt-5 pb-3 pb-0">
            <div class="row">
                <div class="col position-relative">
                
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid bg-white">
            <div class="row">
                <div class="column-container3">
                    <div class="top-left3"></div>
                    <div class="top-right3"></div>
                </div>
                <div class="col position-relative " data-aos="flip-up">
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-9 col-sm-11 col-11 position-absolute top-50 start-50 translate-middle"  style="margin-top: -2rem;">
                        <div class="card shadow" style="border-top-right-radius: 32px; border-top-left-radius: 32px; border-bottom-right-radius: 0px; border-bottom-left-radius: 32px;">
                            <div class="card-body fs-2 text-center" style="line-height: 1; font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; sans-serif;">
                                {{ $elements[15]->texto }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           


            <div class="row" data-aos="zoom-in" style="margin-top: 9rem;">
                <div class="col-11 mx-auto">
                    <div class="row">
                        <div class="slider-clientes">
                            @foreach ($clientes as $cli)
                                <div class="col">
                                    <div class="card border-0 p-4">
                                        <div class="imagen-cliente" style="background-image: url('{{ asset('img/photos/clientes/'.$cli->logo) }}');"></div>
                                    </div>
                                </div>
                            @endforeach        
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="row mt-5" data-aos="zoom-in">
                <div class="col mt-5 py-5">
                    <div class="row">
                        <div class="col text-center fw-bolder titulo-index2">
                            {{ $elements[16]->texto }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row formu-grande pb-5" data-aos="zoom-in">
                <form action="{{ route('formularioContac') }}" id="form-grande" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tipoForm" id="" value="inicio">
                    <div class="col-11 mx-auto">
                        <div class="row">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-9 mx-auto position-relative">
                                <div class="col-12 posicion position-absolute bottom-0 start-50 translate-middle">
                                    <div class="row">
                                        <div class="col-xxl-8 col-xl-8 col-lg-9 mx-auto text-center">
                                            <button type="submit" class="btn btn-outline rounded-pill py-3 w-100" style="background-color: #201E1F; color: #FFC000;">
                                                <div class="row">
                                                    <div class="col-8 text-end position-relative" style="font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; sans-serif; font-weight: bold;">
                                                        ENVÍA MENSAJE
                                                        <div class="col-4 text-start position-absolute top-50 start-100 translate-middle-y">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="1.6rem" width="6rem" viewBox="0 0 448 512" fill="#FFC000"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                                                        </div>
                                                    </div>
                                                </div>    
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-9 mx-auto position-relative py-3">
                                <div class="row">
                                    <div class="col pt-4">
                                        <input required type="text" name="nombre" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Nombre" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col pt-4">
                                        <input required type="email" name="correo" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Email" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col pt-4">
                                        <input required type="text" name="ciudad" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Ciudad" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col pt-4">
                                        <input required type="text" name="mensaje" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Mensaje" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col">
                                <p id="errores-f"></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row formu-small pb-5" data-aos="zoom-in" style="background-color: #FFFFFF;">
                <form action="{{ route('formularioContac') }}" id="form-small" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tipoForm" value="inicio">
                    <div class="col-11 mx-auto">
                        <div class="row">
                            
                            <div class="col-md-9 col-sm-12 col-12 mx-auto position-relative py-3">
                                <div class="row">
                                    <div class="col pt-4">
                                        <input required type="text" name="nombre" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Nombre" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col pt-4">
                                        <input required type="email" name="correo" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Email" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col pt-4">
                                        <input required type="text" name="ciudad" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Ciudad" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col pt-4">
                                        <input required type="text" name="mensaje" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Mensaje" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="col-md-9 col-sm-12 col-12 mx-auto position-relative">
                                <div class="row mt-2">
                                    <div class="col-md-6 col-sm-9 col-9 mx-auto text-center">
                                        <button type="submit" class="btn btn-outline rounded-pill py-3 w-100" style="background-color: #201E1F; color: #FFC000;">
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8 col-8 text-end position-relative">
                                                    ENVÍA MENSAJE
                                                    <div class="col-4 text-start position-absolute top-50 start-100 translate-middle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.6rem" width="6rem" viewBox="0 0 448 512" fill="#FFC000"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                                                    </div>
                                                </div>
                                            </div>    
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
           
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" style="z-index: 9999;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen modal-dialog-scrollable  ng-dark">
            <div class="modal-content" style="background-color: #201E1F; color: #FFFFFF;">
                <div class="modal-header">
                    
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-6" style="font-family: 'Sansation Bold', sans-serif; font-weight: bold;">

                            </div>
                            <div class="col-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-lg btn-danger w-100 text-white" data-bs-dismiss="modal">Cerrar ventana</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('jqueryExtra')
<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>

<script>
    // Espera a que el documento esté listo
    $(document).ready(function() {
        var contadorElemento = $("#contador_clientes");
        var valorActual = 0;

        function incrementarContador() {
            valorActual++;
            contadorElemento.text(valorActual);
      
            if (valorActual === 110) {
                clearInterval(intervalo);
            }
        }

        // Establece un intervalo para llamar a la función incrementarContador cada segundo
        var intervalo = setInterval(incrementarContador, 180);
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tituloIndex = document.querySelector('.titulo-index');

        // Obtén el texto del elemento
        var texto = tituloIndex.textContent;

        // Separa el texto en palabras
        var palabras = texto.split(/\s+/);

        // Aplica estilos según si la palabra es mayúscula o minúscula
        var resultado = palabras.map(function (palabra) {
            if (palabra === palabra.toUpperCase()) {
                return '<span style="font-family: \'Sansation Bold\', sans-serif;" class="mayuscula">' + palabra + '</span>';
            } else {
                return '<span style="font-family: \'Sansation Bold\', sans-serif;" class="minuscula">' + palabra + '</span>';
            }
        });

        // Actualiza el contenido con los estilos aplicados
        tituloIndex.innerHTML = resultado.join(' ');

        var tituloIndex2 = document.querySelector('.titulo-index2');

        // Obtén el texto del elemento
        var texto2 = tituloIndex2.textContent;

        // Separa el texto2 en palabras
        var palabras2 = texto2.split(/\s+/);

        // Aplica estilos según si la palabra es mayúscula o minúscula
        var resultado2 = palabras2.map(function (palabra2) {
            if (palabra2 === palabra2.toUpperCase()) {
                return '<span style="font-family: \'Sansation Bold\', sans-serif;" class="mayuscula2">' + palabra2 + '</span>';
            } else {
                return '<span style="font-family: \'Sansation Bold\', sans-serif;" class="minuscula2">' + palabra2 + '</span>';
            }
        });

        // Actualiza el contenido con los estilos aplicados
        tituloIndex2.innerHTML = resultado2.join(' ');
    });
</script>
<script>

    $('.servicios').slick({
        dots: true,
        appendDots: $('.slider-dots-container-pri'),
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '.slick-prev-pri', // Selector del botón anterior
        nextArrow: '.slick-next-pri', // Selector del botón siguiente
        responsive: [
        {
            breakpoint: 1201,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 993,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 769,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 577,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 321,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        ]
    });

    $('.slider-principal').slick({
        dots: true,
        infinite: false,
        speed: 300,
        arrows:false,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: false,
        responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        ]
    });

    $('.slider-clientes').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: true,
        nextArrow: true,
        centerMode: false,
        responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        ]
    });

</script>

<script>

    var sucursaless = @json($sucursales);
    console.log(sucursaless);

    var map = L.map('map', { attributionControl: false, scrollWheelZoom: false, dragging: true }).setView([23.6345, -102.5528], 6);

    map.on('zoomend', function () {
        var currentZoom = map.getZoom();
        console.log('Zoom level:', currentZoom);
        var contenedorVisita = document.getElementById('container-visitas');
        var contenedorLetrero = document.getElementById('container-letrero');

        if(currentZoom > 6) {
            contenedorVisita.style.display = "none";
            contenedorLetrero.style.display = "none";
        }

        if(currentZoom <= 6) {
            contenedorVisita.style.display = "block";
            contenedorLetrero.style.display = "block";
        }
            
    });

    // Cargar el archivo GeoJSON y agregarlo al mapa con un estilo personalizado
    $.getJSON('vendor/leaflet/maps/mexico.geojson', function (data) {
        var geojsonLayer = L.geoJson(data, {
            style: {
                color: 'white',  // Color del borde
                fillColor: 'black',  // Color de relleno
                fillOpacity: 0.8  // Opacidad del relleno
            }
        }).addTo(map);

       // Inicializar Hammer.js en el contenedor del mapa
        var mapContainer = document.getElementById('map');
        var hammer = new Hammer(mapContainer);

        hammer.on('doubletap', function () {
            // Manejar el evento de doble toque (doble clic)
            enableZoom();
        });
       

        hammer.on('tap', function () {
            // Si es un toque único, deshabilitar el zoom y la interactividad
            disableZoom();
        });

        function enableZoom() {
            // Habilitar el zoom y la interactividad
            map.scrollWheelZoom.enable();
            map.touchZoom.enable();
        }

        function disableZoom() {
            // Deshabilitar el zoom y la interactividad
            map.scrollWheelZoom.disable();
            map.touchZoom.disable();
        }

        // sucursaless.forEach(succ => {
        //     var sucursalPopup = L.popup().setContent(succ.sucursal);
        //     var marker = L.marker([succ.coordX, succ.coordY]).addTo(map);
        //     marker.bindPopup(sucursalPopup);
        //     marker.on('click', function () {
        //         marker.openPopup();
        //     });
        // });

        // Añadir efecto de hover para todos los estados
        geojsonLayer.on('mouseover', function (e) {
            var layer = e.layer;
            var hoverColor = getRandomColor(); // Obtener un color aleatorio para el hover
            layer.setStyle({
                fillColor: hoverColor,
                fillOpacity: 1
            });
        });

        // Restaurar el estilo original al quitar el hover
        geojsonLayer.on('mouseout', function (e) {
            var layer = e.layer;
            layer.setStyle({
                fillColor: 'black',  // Restaura el color de relleno original
                fillOpacity: 0.8
            });
        });

        // Función para generar un color aleatorio en formato hexadecimal
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        geojsonLayer.on('click', function (e) {
            var sucursales = @json($sucursales);
            console.log(sucursales);
            var estados = @json($estados);
            console.log(estados);
            var municipios = @json($municipios);
            console.log(municipios);
            var galeria = @json($galeria);
            console.log(galeria);

            var stateName = e.layer.feature.properties.state_name;
            var stateId = e.layer.feature.properties.state_code;
            var modalHeader = $('.modal-header');
            var modalBody = $('.modal-body');

            modalHeader.html("<p style='font-size: 2.6rem; font-weight: 500; font-family: 'Sansation Bold', sans-serif; font-weight: bold;'>Nuestras sucursales en <strong>" + stateName + "</strong></p>" + 
                "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>");

            // Crear una lista HTML para las sucursales
            var sucursalesHTML = '<ul>';
            sucursales.forEach(sucursal => {
                if (sucursal.estado == stateId) {
                    var nombreMunicipio;

                    for (const mun of municipios) {
                        if (mun.id == sucursal.municipio) {
                            nombreMunicipio = mun.nombre;
                            break;
                        }
                    }

                    sucursalesHTML += '<p class="fs-3"><svg xmlns="http://www.w3.org/2000/svg" height="26" width="22" fill="#FFFFFF" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>&nbsp;&nbsp;&nbsp;' + sucursal.sucursal + ' - <strong>' + nombreMunicipio + '</strong></p>';
                }
            });

            sucursalesHTML += '</ul>';
            // Crear una lista HTML para las sucursales
            var sucursales_galeriaHTML = '<div class="row"><div class="slider_galeria">';
            galeria.forEach(gal => {
                if (gal.estado == stateId) {
                    sucursales_galeriaHTML += '<div class="col"><div class="carrusel-interno shadow-lg border-2 border-dark" style="background-image: url(img/photos/sucursales/galeria/' + gal.foto + ');"></div></div>';
                }
            });
            sucursales_galeriaHTML += '</div></div>';

            // Set the content of the modal body
            modalBody.html('<div class="container-fluid">' +
                '<div class="row">' +
                   '<div class="col-xxl-6 col-xl-6 col-lg-9 col-md-11 col-sm-11 col-11 mx-auto py-5 fs-3" style="font-family: \'Sansation Bold\', sans-serif;">'+ 
                        '' +
                        sucursalesHTML +
                    '</div> ' + 
                    '<div class="col-xxl-6 col-xl-6 col-lg-9 col-md-11 col-sm-11 col-11 mx-auto py-1"> ' + 
                        sucursales_galeriaHTML +
                    '</div> ' + 
                '</div> ' + 
            '</div>');

            // Show the modal
            $('#exampleModal').modal('show');

            // Inicializar el carrusel después de mostrar el modal
            initSlider();

            // Cerrar el modal al hacer clic en el botón de cerrar
            $('#exampleModal').on('hidden.bs.modal', function () {
                // Limpiar el contenido del modal al cerrarlo
                modalBody.html('');
            });
        });

        // Función para inicializar el carrusel
        function initSlider() {
            var sliderItems = document.querySelectorAll('.slider_galeria .carrusel-interno');
            var currentIndex = 0;

            function showItem(index) {
                sliderItems.forEach((item, i) => {
                    item.style.display = i === index ? 'block' : 'none';
                });
            }

            function nextItem() {
                currentIndex = (currentIndex + 1) % sliderItems.length;
                showItem(currentIndex);
            }

            function prevItem() {
                currentIndex = (currentIndex - 1 + sliderItems.length) % sliderItems.length;
                showItem(currentIndex);
            }

            // Mostrar el primer elemento al iniciar
            showItem(currentIndex);

            // Agregar eventos de clic para navegar
            document.querySelector('.slider_galeria').addEventListener('click', function (e) {
                if (e.target.classList.contains('carrusel-interno')) {
                    nextItem();
                }
            }); 
        }
        
    });


</script>

{{-- @foreach ($sucursales as $sucu)
    <script>
        var coordX = {{ $sucu->coordX }};
        var coordY = {{ $sucu->coordY }};
        var sucursalPopup = L.popup().setContent('{{ $sucu->sucursal }}');

        // Agrega marcadores
        var marker = L.marker([coordX, coordY]).addTo(map);

        // Asigna el popup al marcador y agrega el evento click
        marker.bindPopup(sucursalPopup);

        marker.on('click', function () {
            marker.openPopup();
        });
    </script>
@endforeach --}}



@endsection
