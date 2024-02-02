@extends('layouts.front')

@section('title', 'Vacantes')

@section('cssExtras')
    <link rel="stylesheet" href="{{ asset('css/front/bolsa_trabajo.css') }}">
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
<div class="container-fluid" data-aos="fade-zoom-in"
     data-aos-easing="ease-in-back"
     data-aos-delay="300"
     data-aos-offset="0">
    <div class="row">
        <div class="col-11 mt-5 text-center titulo-bolsa">
            {{ $elements[0]->texto }}
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-11 col-11 mx-auto text-center texto-bolsa" style="font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bold;">
            {{ $elements[1]->texto }}
        </div>
    </div>
</div>

<div class="container-fluid" data-aos="fade-zoom-in"
     data-aos-easing="ease-in-back"
     data-aos-delay="300"
     data-aos-offset="0">
    <div class="row py-5">
        <div class="col imagen-vacantes" style="background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[2]->imagen) }}');"></div>
    </div>
    
 
            <div class="row py-5" data-aos="zoom-in-left">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mx-auto">
                    
                    <div class="row" style="overflow: hidden;">
                        <div class="servicios">

                            @foreach ($vacantes as $vac)
                            <div class="col-3">
                                <div class="card position-relative carta border-0" style="background-color: {{ $vac->color }};">
                                    <div class="card-img-overlay" {{--style="background-image: url('{{ asset('img/photos/vacantes/'.$vac->portada) }}');"--}}>
                                    </div>
                                    <div class="card-body">
                                        {{-- <small class="card-orden">{{ $vac->orden }}</small> --}}
                                        <h3 class="card-title p-0 m-0" style="font-family: 'Sansation Bold', sans-serif; font-weight: bold;">{{ $vac->titulo }}</h3>
                                        <p class="card-text" style="font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bolder;">
                                            {{ $vac->descripcion }}
                                        </p>
                                    </div>
                                    <div class="position-relative cont-btn">
                                        <div class="card bg-transparent border-0 ms-4 position-absolute bottom-0 start-0 translate-middle-y">
                                            <div class="row">
                                                <div class="col-xxl-4 link-servicio">
                                                    <a href="{{ route('front.contact') }}" class="text-center  rounded-circle">
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
<div class="column-container w-100">
    <div class="top-left"></div>
    <div class="top-right"></div>
</div>

<div class="container-fluid py-5 bg-white">
    <div class="row">
        <div class="col-10 mx-auto beneficio-titulo" style="font-family: 'Sansation Bold', sans-serif;  font-weight: bold;">
            Beneficios
        </div>
    </div>
    @foreach($beneficios as $ben)
        @if($cont == 4) 
            @php
                $band = 1;
            @endphp
        @endif 
        @if($cont == 0 || $cont == 1) 
            @php
                $band = 0;
            @endphp
        @endif
        @if($band == 1) 
            @php
                $cont--;
            @endphp
        @else 
            @php
                $cont++;
            @endphp
        @endif

        <div class="row mt-3" data-aos="fade-right" data-aos-offset="300" data-aos-delay="300">
            <div class="beneficio-col {{ (($cont == 0 || $cont == 1) ? "col-6" : (($cont == 2) ? "col-7" : (($cont == 3) ? "col-8": "col-9"))) }}" style="font-family: 'Sansation Bold', sans-serif; font-weight: bold;">
                {{ $ben->beneficio }}
            </div>
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 col-2 ms-3 d-flex abengn-content-start justify-content-start rounded-circle">
                <div class="beneficio-color position-relative" style="background-color: #FFC000">
                    <div class="beneficio-icono position-absolute top-50 start-50 translate-middle" style="background-image: url('{{ asset('img/photos/beneficios/'.$ben->icono) }}');"></div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<section>
    <div class="container-fluid bg-white">
        <div class="row" data-aos="zoom-in">
            <div class="col py-5">
                <div class="row">
                    <div class="col text-center titulo-bolsa2" style="font-family: 'Sansation Bold', sans-serif; ">
                        Postúlate con NOSOTROS                           
                    </div>
                </div>
            </div>
        </div>
        <div class="row formu-grande pb-5" data-aos="zoom-in">
            <form action="{{ route('formularioContac') }}" id="form-grande" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="tipoForm" value="vacante">
                <div class="col-11 mx-auto">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-9 mx-auto position-relative">
                            <div class="col-12">
                                <div class="row mt-5 mb-5">
                                    <div class="col-xxl-8 col-xl-8 col-lg-10 fs-5 mx-auto" style="line-height: 1.1; font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bold;">
                                        {{  $elements[5]->texto }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-xxl-8 col-xl-8 col-lg-10 mx-auto text-center">
                                        <button type="button" id="fileButton" class="btn btn-outline rounded-pill py-3 w-100" style="background-color: #201E1F; color: #FFC000;">
                                            <div class="row">
                                                <div class="col-8 text-end position-relative" style="ffont-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bold;">
                                                    ADJUNTAR C.V.
                                                    <div class="col-4 text-end position-absolute top-50 start-100 translate-middle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" fill="#FFC000" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V299.6l-94.7 94.7c-8.2 8.2-14 18.5-16.8 29.7l-15 60.1c-2.3 9.4-1.8 19 1.4 27.8H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"/></svg>
                                                    </div>
                                                </div>
                                            </div>    
                                        </button>
                                        <input required type="file" name="curriculum" id="fileInput" style="display: none;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-8 col-xl-8 col-lg-10 mx-auto text-center">
                                        <button type="submit" class="btn btn-outline rounded-pill py-3 w-100" style="background-color: #201E1F; color: #FFC000;">
                                            <div class="row">
                                                <div class="col-8 text-end position-relative" style="font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bold;">
                                                    ENVÍA MENSAJE
                                                    <div class="col-4 text-end position-absolute top-50 start-100 translate-middle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 448 512" fill="#FFC000"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
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
                                    <input required type="text" name="vacante" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Vacante" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input required type="text" name="mensaje" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Mensaje" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>

        <div class="row formu-small pb-5" data-aos="zoom-in" style="background-color: #FFFFFF;">
            <form action="{{ route('formularioContac') }}" id="form-small" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="tipoForm" value="vacante">
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
                                    <input required type="text" name="vacante" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Vacante" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input required type="text" name="mensaje" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Mensaje" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-md-9 col-sm-12 col-12 mx-auto position-relative">
                            <div class="row mt-5 mb-5">
                                <div class="col-xxl-9 col-xl-9 col-lg-10 fs-5 mx-auto" style="line-height: 1.1; font-family: 'Sansation Bold';">
                                    {{ $elements[5]->texto }}
                                </div>
                            </div>
                
                            <div class="row mb-3 mt-3">
                                <div class="col-md-6 col-sm-9 col-10 mx-auto text-center">
                                    <button type="button" id="fileButton2" class="btn btn-outline rounded-pill py-3 w-100" style="background-color: #201E1F; color: #FFC000;">
                                        <div class="row">
                                            <div class="col-8 text-end position-relative" style="font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bold;">
                                                ADJUNTAR C.V.
                                                <div class="col-4 text-end position-absolute top-50 start-100 translate-middle">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" fill="#FFC000" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V299.6l-94.7 94.7c-8.2 8.2-14 18.5-16.8 29.7l-15 60.1c-2.3 9.4-1.8 19 1.4 27.8H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"/></svg>
                                                </div>
                                            </div>
                                        </div>    
                                    </button>
                                    <input required type="file" name="curriculum" id="fileInput" style="display: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-9 col-10 mx-auto text-center">
                                    <button type="submit" class="btn btn-outline rounded-pill py-3 w-100" style="background-color: #201E1F; color: #FFC000;">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8 col-8 text-end position-relative" style="font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bold;">
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

@endsection

@section('jsLibExtras2')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tituloBolsa = document.querySelector('.titulo-bolsa');

        // Obtén el texto del elemento
        var texto = tituloBolsa.textContent;

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
        tituloBolsa.innerHTML = resultado.join(' ');

        
    });

    document.addEventListener('DOMContentLoaded', function () {

    var tituloBolsa2 = document.querySelector('.titulo-bolsa2');

        // Obtén el texto del elemento
        var texto2 = tituloBolsa2.textContent;

        // Separa el texto2 en palabras
        var palabras2 = texto2.split(/\s+/);

        // Aplica estilos según si la palabra es mayúscula o minúscula
        var resultado = palabras2.map(function (palabra) {
            if (palabra2 === palabra2.toUpperCase()) {
                return '<span style="font-family: \'Sansation Bold\', sans-serif;" class="mayuscula2">' + palabra2 + '</span>';
            } else {
                return '<span style="font-family: \'Sansation Bold\', sans-serif;" class="minuscula2">' + palabra2 + '</span>';
            }
        });

        // Actualiza el contenido con los estilos aplicados
        tituloBolsa2.innerHTML = resultado.join(' ');
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

</script>
<script>
    document.getElementById('fileButton').onclick = function() {
        document.getElementById('fileInput').click();
    };

    document.getElementById('fileInput').onchange = function() {
        // Aquí puedes realizar acciones cuando se selecciona un archivo
        var selectedFile = this.files[0];
        if (selectedFile) {
            console.log('Archivo seleccionado:', selectedFile.name);
        }
    };

    document.getElementById('fileButton2').onclick = function() {
        document.getElementById('fileInput2').click();
    };

    document.getElementById('fileInput2').onchange = function() {
        // Aquí puedes realizar acciones cuando se selecciona un archivo
        var selectedFile2 = this.files[0];
        if (selectedFile2) {
            console.log('Archivo seleccionado:', selectedFile2.name);
        }
    };
</script>
@endsection