@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/front/index.css') }}">
@endsection

@section('jsLibExtras')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('styleExtras')

@endsection

@section('content')
<style>

@font-face {
        font-family: 'Sansation Bold';
        src: url("{{ asset('fonts/Sansation-Bold/Sansation_Bold.ttf') }}") format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    .cuadro:hover {
        color: #ffffff;
        background-color: rgba(0, 0, 0, 0.9);
    }

    @media(min-width: 1800px) {
        .slider-principal {
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 40rem;
            width: 100%;
            box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.1);
        }

      
    }

    /* xxl */
    @media (min-width: 1400px) and (max-width: 1799px) {
        .slider-principal {
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 36rem;
            width: 100%;
            box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.1);
        }

       
    }

    /* xl */
    @media (min-width: 1200px) and (max-width: 1400px) {
        .slider-principal {
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 36rem;
            width: 100%;
            box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.1);
        }

    }

    /* lg */
    @media (min-width: 992px) and (max-width: 1200px) {
        .slider-principal {
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 38rem;
            width: 100%;
            box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.1);
        }

       
    }

    /* md */
    @media (min-width: 768px) and (max-width: 992px) {
        .slider-principal {
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 38rem;
            width: 100%;
            box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.1);
        }

       
    }

    /* sm */
    @media (min-width: 576px) and (max-width: 768px) {
        .slider-principal {
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 36rem;
            width: 100%;
            box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.1);
        }

    }

    /* xs */
    @media (min-width: 0px) and (max-width: 576px) {
        .slider-principal {
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 32rem;
            width: 100%;
            box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.1);
        }

    }

</style>

<style>
    /* input con opacidad y sin boton de selecciond e archivo */
		.file-upload input[type="file"] {
                    position: absolute;
                    left: -9999px;
                    }

                    .file-upload label {
                    display: inline-block;
                    background-color: #00000031;
                    color: #fff;
                    padding: 6px 12px;
                    cursor: pointer;
                    border-radius: 4px;
                    font-weight: normal;
                    /* opacity: 80%; */
                    }

                    .file-upload input[type="file"] + label:before {
                    content: "\f07b";
                    font-family: "Font Awesome 5 Free";
                    font-size: 16px;
                    margin-right: 5px;
                    transition: all 0.5s;
                    }

                    .file-upload input[type="file"] + label {
                        transition: all 0.5s;
                    }

                    .file-upload input[type="file"]:focus + label,
                    .file-upload input[type="file"] + label:hover {
                    backdrop-filter: blur(5px);
                    background-color: #41464a37;
                    opacity: 100%;
                    transition: all 0.5s;
                    }
    /* input con opacidad y sin boton de selecciond e archivo */
</style>

<div class="row mb-4 px-2">
    <a href="{{ route('config.seccion.index') }}" class="col col-md-2 btn btn-sm bg-white darken-2 text-dark mr-auto rounded-pill"><i class="fa fa-reply"></i> Regresar</a>
</div>


<section data-aos="fade-zoom-in"
     data-aos-easing="ease-in-back"
     data-aos-delay="300"
     data-aos-offset="0" style="background-color: #201E1F;">
        <div class="container-fluid py-5" style="background-color: #201E1F;">
            <div class="row">
                <div class="col text-center position-relative">
                    <video muted autoplay loop style="width: 60rem; height: 30rem;">
                        <source src="{{ asset('img/photos/video_principal/'.$elements[2]->imagen) }}" type="video/mp4">
                    </video>
                    <div class="col-4 mx-auto position-absolute top-50 start-50 translate-middle">
                        <form id="form_video_slider" action="imgSiderVideo" method="POST"  class="file-upload mt-2" style="" enctype="multipart/form-data">
                            @csrf
                            <input id="input_slider_video" class="m-0 p-0" type="file" name="archivov">
                            <label class="col-12 m-0 p-2 d-flex justify-content-center align-items-center" for="input_slider_video" style="opacity: 100%; !important; border-radius: 26px; background-color: #44B2E3; font-family: 'Sansation Bold', sans-serif;">Actualizar video de fondo</label>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-11 col-11 position-relative titulo-pri mx-auto fw-bold text-end">
                    <textarea class="col-12 display-5 text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[0]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="3" style="border-radius: 10px; border:none; background: #ededed; font-family: 'Sansation Bold', sans-serif;">{{$elements[0]->texto}}</textarea>
                    <div class="col-1 position-absolute top-0 start-100 translate-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-8 col-sm-11 col-11 py-4 mx-auto position-relative text-white texto-ind">
                    <textarea class="col-12 text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[1]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="3" style="border-radius: 10px; border:none; background: #ededed; font-family: 'Sansation Bold', sans-serif;">{{$elements[1]->texto}}</textarea>
                    <div class="col-1 position-absolute top-0 start-100">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-8 col-sm-11 col-11 mx-auto">
                    <div class="row">
                        <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-9 col-12 mx-xxl-0 mx-xl-0 mx-lg-0 mx-md-0 mx-sm-auto mx-auto text-center">
                            <a href="#" class="btn btn-outline py-2 fw-bolder bg-white rounded-pill w-100 text-dark">
                                COTIZAR AQUÍ <svg xmlns="http://www.w3.org/2000/svg" height="1.4rem" width="3rem" fill="#FFC000" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid px-0">
        
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center flex-column mt-2 text-center">
                <h3 class="fs-1 fw-bolder" style="color:white; font-family: 'Sansation Bold', sans-serif;">Agregar slider</h3>
                <form id="form_image_slider" action="imgSider" method="POST"  class="file-upload mt-2" style="" enctype="multipart/form-data">
                    @csrf
                    <input id="input_slider_img" class="m-0 p-0" type="file" name="archivo">
                    <label class="col-12 m-0 p-2 d-flex justify-content-center align-items-center" for="input_slider_img" style="opacity: 100%; !important; border-radius: 26px; background-color: #44B2E3; font-family: 'Sansation Bold', sans-serif;">Seleccionar archivo</label>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="carrusel-principal">
                @foreach ($slider_principal as $sp)
                    <div class="col-12 position-relative">
                        <div class="row">
                            <div class="col-12 mx-auto py-3 position-relative text-end">
                                <form action="{{ route('config.seccion.delSide', [$sp->id]) }}" method="POST">						
                                    @csrf
                                    @method('DELETE') 
                                    <button type="submit" class="btn btn-danger btn-block bg-danger rounded-pill"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col slider-principal py-5" style="
                                background-image: url('{{ asset('img/photos/slider_principal/'.$sp->slider) }}'); 
                            ">  </div>
                        </div>
                        
                    </div>
                        
                  
                    
                @endforeach
            </div>
        </div>
        <div class="row py-5">
            <div class="col py-5 position-relative text-center fs-1 fw-bolder border text-white py-5" style="font-family: 'Sansation Bold', sans-serif;">
                SERVICIOS
                <div class="col-12 d-flex align-content-center justify-content-center position-absolute top-0 bottom-0 start-0 cuadro">

                </div>
            </div>
        </div>
        <div class="row py-5">
            <div class="col py-5 position-relative text-center fs-1 fw-bolder border text-white py-5" style="font-family: 'Sansation Bold', sans-serif;">
                SUCURSALES
                <div class="col-12 d-flex align-content-center justify-content-center position-absolute top-0 bottom-0 start-0 cuadro">
                   
                </div>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-11 position-relative mx-auto">
                <div class="col-12 position-absolute">
                    <div class="row">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" data-aos="zoom-in" data-aos-delay="100">
                            <div class="row">
                                <div class="col-xxl-10 col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 position-relative mx-auto circulo-imagen" style="background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[8]->imagen) }}'); background-color: #CDE700;">
                                    <div class="col-11 position-relative ms-5 position-absolute top-0 start-0 mt-5">
                                        <textarea class="col-12 fs-3 fw-bolder text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[7]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="3" style="border-radius: 10px; border:none; background: #ededed; font-family: 'Sansation Bold', sans-serif;">{{$elements[7]->texto}}</textarea>
                                        <div class="col-1 position-absolute top-0 start-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                        </div>
                                    </div>
                                    <div class="col-12 position-absolute top-50 start-50 translate-middle">
                                        <form id="form_aux2" action="image_input_ejemplo" method="POST" class="file-upload px-auto col-7" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id_elemento" value="{{ $elements[8]->id }}">
                                            <input id="img_aux2" class="m-0 p-0" type="file" name="archivo">
                                            <label class="col-12 m-0 px-2 d-flex justify-content-center align-items-center" for="img_aux2" style=" height: 100%; opacity: 100%; border-radius: 20px; font-family: 'Sansation Bold', sans-serif;">Seleccionar archivo</label>
                                        </form>
                                        <script>
                                            $('#img_aux2').change(function(e) {
                                                $('#form_aux2').trigger('submit');
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-baja" data-aos="zoom-in" data-aos-delay="100"> 
                            <div class="row">
                                <div class="col-xxl-10 col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 position-relative mx-auto circulo-imagen" style="background-image: url('{{ asset('img/images/home/index2.png') }}'); background-color: #CCAEEC;">
                                    <div class="col-11 position-relative ms-5 position-absolute top-0 start-0 mt-5">
                                        <textarea class="col-12 fs-3 fw-bolder text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[9]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="3" style="border-radius: 10px; border:none; background: #ededed; font-family: 'Sansation Bold', sans-serif;">{{$elements[9]->texto}}</textarea>
                                        <div class="col-1 position-absolute top-0 start-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                        </div>
                                    </div>
                                    <div class="col-12 position-absolute top-50 start-50 translate-middle">
                                        <form id="form_aux3" action="image_input_ejemplo" method="POST" class="file-upload px-auto col-7" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id_elemento" value="{{ $elements[10]->id }}">
                                            <input id="img_aux3" class="m-0 p-0" type="file" name="archivo">
                                            <label class="col-12 m-0 px-2 d-flex justify-content-center align-items-center" for="img_aux3" style=" height: 100%; opacity: 100%; border-radius: 20px; font-family: 'Sansation Bold', sans-serif;">Seleccionar archivo</label>
                                        </form>
                                        <script>
                                            $('#img_aux3').change(function(e) {
                                                $('#form_aux3').trigger('submit');
                                            });
                                        </script>
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
                                <div class="col-xxl-10 col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 position-relative mx-auto circulo-imagen" style="background-image: url('{{ asset('img/images/home/index3.png') }}'); background-color: #FE6E63;">
                                    <div class="col-11 position-relative ms-5 position-absolute top-0 start-0 mt-5">
                                        <textarea class="col-12 fs-3 fw-bolder text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[11]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="3" style="border-radius: 10px; border:none; background: #ededed; font-family: 'Sansation Bold', sans-serif;">{{$elements[11]->texto}}</textarea>
                                        <div class="col-1 position-absolute top-0 start-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                        </div>
                                    </div>
                                    <div class="col-12 position-absolute top-50 start-50 translate-middle">
                                        <form id="form_aux4" action="image_input_ejemplo" method="POST" class="file-upload px-auto col-7" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id_elemento" value="{{ $elements[12]->id }}">
                                            <input id="img_aux4" class="m-0 p-0" type="file" name="archivo">
                                            <label class="col-12 m-0 px-2 d-flex justify-content-center align-items-center" for="img_aux4" style=" height: 100%; opacity: 100%; border-radius: 20px; font-family: 'Sansation Bold', sans-serif;">Seleccionar archivo</label>
                                        </form>
                                        <script>
                                            $('#img_aux4').change(function(e) {
                                                $('#form_aux4').trigger('submit');
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-baja" data-aos="zoom-in" data-aos-delay="100">
                            <div class="row">
                                <div class="col-xxl-10 col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 position-relative mx-auto circulo-imagen" style="background-image: url('{{ asset('img/images/home/index4.png') }}'); background-color: #A2E9FF;">
                                    <div class="col-11 position-relative ms-5 position-absolute top-0 start-0 mt-5">
                                        <textarea class="col-12 fs-3 fw-bolder text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[13]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="3" style="border-radius: 10px; border:none; background: #ededed; font-family: 'Sansation Bold', sans-serif;">{{$elements[13]->texto}}</textarea>
                                        <div class="col-1 position-absolute top-0 start-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                        </div>
                                    </div>
                                    <div class="col-12 position-absolute top-50 start-50 translate-middle">
                                        <form id="form_aux5" action="image_input_ejemplo" method="POST" class="file-upload px-auto col-7" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id_elemento" value="{{ $elements[14]->id }}">
                                            <input id="img_aux5" class="m-0 p-0" type="file" name="archivo">
                                            <label class="col-12 m-0 px-2 d-flex justify-content-center align-items-center" for="img_aux5" style=" height: 100%; opacity: 100%; border-radius: 20px; font-family: 'Sansation Bold', sans-serif;">Seleccionar archivo</label>
                                        </form>
                                        <script>
                                            $('#img_aux5').change(function(e) {
                                                $('#form_aux5').trigger('submit');
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-white" style="margin-top: 120rem;">
            <div class="column-container3">
                <div class="top-left3"></div>
                <div class="top-right3"></div>
            </div>
            <div class="col position-relative " data-aos="flip-up">
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-9 col-sm-11 col-11 position-absolute top-50 start-50 translate-middle"  style="margin-top: -2rem;">
                    <div class="card shadow" style="border-top-right-radius: 32px; border-top-left-radius: 32px; border-bottom-right-radius: 0px; border-bottom-left-radius: 32px;">
                        <div class="card-body fs-2 text-center" style="line-height: 1;">
                            <textarea class="col-12 fs-3 fw-bolder text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[15]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="3" style="border-radius: 10px; border:none; background: #ededed">{{$elements[15]->texto}}</textarea>
                            <div class="col-1 position-absolute top-0 start-100">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="row bg-white py-5" >
            <div class="col-12 py-5 d-flex justify-content-center align-items-center flex-column mt-2 text-center">
                <h3 class="fs-1 fw-bolder" style="color:black; font-family: 'Sansation Bold', sans-serif;">Agregar Cliente</h3>
                <form id="form_image_slider2" action="{{ route('config.seccion.imgSiderCliente') }}" method="POST"  class="file-upload mt-2" style="" enctype="multipart/form-data">
                    @csrf
                    <input id="input_slider_img2" class="m-0 p-0" type="file" name="archivo">
                    <label class="col-12 m-0 p-2 d-flex justify-content-center align-items-center" for="input_slider_img2" style="opacity: 100%; !important; border-radius: 26px; background-color: #44B234; font-family: 'Sansation Bold', sans-serif;">Seleccionar archivo</label>
                </form>
            </div>
        </div>
        <div class="row bg-white">
            <div class="col-11 mx-auto">
                <div class="clientes">
                    @foreach ($clientes as $clie)
                        <div class="col position-relative">
                            <div style="
                                background-image: url('{{ asset('img/photos/clientes/'.$clie->logo) }}');
                                background-size: contain;
                                background-position: center center;
                                background-repeat: no-repeat;
                                height: 120px;
                                width: 100%;
                            "></div>
                            <div class="col-4 py-3 position-absolute top-0 end-0">
                                <form action="{{ route('config.seccion.delSideCliente', ['cliente' => $clie->id]) }}" method="POST" style="display: inline;">						
                                    @csrf
                                    @method('DELETE') 
                                    <button type="submit" class="btn btn-danger btn-block bg-danger rounded-pill"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

   
       
        <div class="row bg-white py-5" data-aos="zoom-in">
            <div class="col mt-5 py-5">
                <div class="row">
                    <div class="col-9 mx-auto position-relative text-center display-1 fw-bolder">
                        <textarea class="col-12 fs-3 fw-bolder text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[16]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="3" style="border-radius: 10px; border:none; background: #ededed">{{$elements[16]->texto}}</textarea>
                        <div class="col-1 position-absolute top-0 start-100 translate-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row formu-grande bg-white pb-5" data-aos="zoom-in">
            <form action="" id="form-grande">
                <div class="col-11 mx-auto">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-9 mx-auto position-relative">
                            <div class="col-12 posicion position-absolute bottom-0 start-50 translate-middle">
                                <div class="row">
                                    <div class="col-xxl-8 col-xl-8 col-lg-9 mx-auto text-center">
                                        <button type="submit" class="btn btn-outline rounded-pill py-2 w-100" style="background-color: #201E1F; color: #FFC000;" disabled>
                                            <div class="row">
                                                <div class="col-8 text-end position-relative">
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
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-9 mx-auto position-relative py-3">
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Nombre" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="email" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Email" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Ciudad" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Mensaje" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;" disabled>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
            </form>
        </div>

        <div class="row bg-white formu-small pb-5" data-aos="zoom-in" style="background-color: #FFFFFF;">
            <form action="" id="form-small">
                <div class="col-11 mx-auto">
                    <div class="row">
                        
                        <div class="col-md-9 col-sm-12 col-12 mx-auto position-relative py-3">
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Nombre" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="email" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Email" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Ciudad" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Mensaje" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
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
@endsection

@section('jqueryExtra')
    <script>
        $('#input_slider_img').change(function(e) {
		    $('#form_image_slider').trigger('submit');
	    });

        $('#input_slider_img2').change(function(e) {
		    $('#form_image_slider2').trigger('submit');
	    });
    </script>
    <script>
        $('#input_slider_video').change(function(e) {
		    $('#form_video_slider').trigger('submit');
	    });
    </script>
    <script>
        $('.carrusel-principal').slick({
        dots: false,
        arrows: true,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
    });
    </script>
    <script>
        $('.clientes').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
    });
    </script>
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
            var intervalo = setInterval(incrementarContador, 380);
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
                    return '<span class="mayuscula">' + palabra + '</span>';
                } else {
                    return '<span class="minuscula">' + palabra + '</span>';
                }
            });
    
            // Actualiza el contenido con los estilos aplicados
            tituloIndex.innerHTML = resultado.join(' ');
        });
    </script>
    <script>
    
        $('.servicios').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: true,
            nextArrow: true,
            centerMode: false,
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
            dots: false,
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
        var map = L.map('map',  { attributionControl: false }).setView([23.6345, -102.5528], 5);
    
        // Cargar el archivo GeoJSON y agregarlo al mapa con un estilo personalizado
        $.getJSON('vendor/leaflet/maps/mexico.geojson', function (data) {
            var geojsonLayer = L.geoJson(data, {
                style: {
                    color: 'white',  // Color del borde
                    fillColor: 'black',  // Color de relleno
                    fillOpacity: 0.8  // Opacidad del relleno
                }
            }).addTo(map);
    
            // Añadir efecto de hover para todos los estados
            geojsonLayer.on('mouseover', function (e) {
                var layer = e.layer;
                layer.setStyle({
                    fillColor: '#FFC000',  // Cambia el color de relleno en hover
                    fillOpacity: 1  // Ajusta la opacidad en hover
                });
            });
    
            geojsonLayer.on('mouseout', function (e) {
                var layer = e.layer;
                layer.setStyle({
                    fillColor: 'black',  // Restaura el color de relleno
                    fillOpacity: 0.8  // Restaura la opacidad
                });
            });
    
            geojsonLayer.on('click', function (e) {
                var stateName = e.layer.feature.properties.state_name;
                var modalBody = $('.modal-body');
                
                // Set the content of the modal body
                modalBody.html('<p style="font-size: 2rem; font-weight: 500;">' + stateName + '</p>');
    
                // Show the modal
                $('#exampleModal').modal('show');
            });
        });
    
    </script>
@endsection