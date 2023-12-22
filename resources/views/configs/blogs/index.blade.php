@extends('layouts.admin')
@section('cssExtras')
    <link rel="stylesheet" href="{{ asset('css/front/blog.css') }}">
@endsection
@section('jsLibExtras')

@endsection
@section('styleExtras')
<style>
    .boton {
        background-color: #FAC706;
        font-size: 2rem;
        padding-left: 2rem;
        padding: 1rem;
        border-radius: 1rem;
        margin: 2rem;
    }

    .boton:hover {
        background-color: white;
    }
</style>
<style>
    .cuadr:hover {
        background-color: black; opacity: 80%;
    }

    .cuadr:hover > .btn {
        display: block;
        color: black;
        background-color: white;
        opacity: 100%;
    }

    .cuadr:hover > .btn:hover {
        display: block;
        color:white;
        background-color: red;
        opacity: 100%;
    }

    .cuadr > .btn {
        display: none;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-11 mx-auto">
            <div class="row mb-4 px-2">
                <a href="{{ route('config.seccion.show', ['slug' => 'blog']) }}" class="col mt-5 mb-5 col-md-2 btn btn-sm grey darken-2 text-dark bg-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
            </div>
        </div>
        
        <div class="col-9 mx-auto">
            <a href="{{ route('config.blog.create') }}" class="btn w-100 boton">Crear nuevo blog</a>
        </div>
    </div>
</div>

<div class="container-fluid px-0 mb-5 mt-5 mb-5" data-aos="fade-up">
    @foreach ($blogs as $blog)
        @if (!($cont % 2 == 0)) 
        <div class="row">
            <div class="col position-relative">
                <div class="row margen-row" data-aos="fade-up">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-11 col-sm-11 col-11 mx-auto py-2 margen-tema">
                        <div class="row">
                            <div class="col-10 mx-auto titulo-blog">
                                <div class="row">
                                    <!-- <div class="col-5"></div> -->
                                    <div class="col-12 py-3 text-end" style="color: {{ $blog->color }};">
                                        {{ $blog->titulo }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-9" style="border: 1px solid {{ $blog->color }};"></div>
                                </div>
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-11 py-4 texto-blog">
                                        {{ $blog->resumen }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-5 col-xl-5 col-lg-3 col-md-3 col-sm-3 col-12"></div>
                                    <div class="col-xxl-7 col-xl-7 col-lg-9 col-md-9 col-sm-9 col-12 mx-xxl-0 mx-xl-0 mx-lg-0 mx-md-0 mx-sm-auto mx-auto text-center">
                                        <a href="#" class="btn btn-outline py-3 fs-5 rounded-pill w-100 boton-blog" style="color: {{ $blog }}; border: 1px solid #BCBCBC;">
                                            <div class="row">
                                                <div class="col-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            LEER MÁS
                                                        </div>
                                                        <div class="col-6 text-end">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="2rem" width="3rem" fill="{{ $blog }}" viewBox="0 0 448 512">
                                                                <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-mx-9 col-sm-11 col-11 mx-auto position-relative margen-col px-0">
                        <div class="col-12 position-absolute top-50 start-50 translate-middle px-0">
                            <div class="row">
                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-2 col-sm-2 col-2 py-2"></div>
                                <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-10 col-sm-10 col-10 py-2 fondo-color" style="background-color: {{ $blog->color }};"></div>
                            </div>
                        </div>
                        <div class="col-12 position-absolute top-50 start-50 translate-middle px-0">
                            <div class="row">
                                <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-10 col-sm-10 col-10 py-2 mx-auto fondo-imagen" style="background-image: url({{ asset('img/photos/blog/'.$blog->portada) }});"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center flex-column position-absolute start-0 top-0 bottom-0 cuadr z-3">
                    <a href="{{ route('config.blog.edit', ['id' => $blog->id]) }}" class="btn btn-outline" style="font-size: 40px;">Editar Post</a>
                </div>
            </div>
        </div>
            
        @else
            
            <div class="row">
                <div class="col position-relative">
                    <div class="row margen-row" data-aos="fade-up">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-mx-9 col-sm-11 col-11 mx-auto position-relative margen-col px-0">
                            <div class="col-12 position-absolute top-50 start-50 translate-middle px-0">
                                <div class="row">
                                    <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-10 col-sm-10 col-10 py-2 fondo-color" style="background-color: {{ $blog->color }};"></div>
                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-2 col-sm-2 col-2 py-2"></div>
                                </div>
                            </div>
                            <div class="col-12 position-absolute top-50 start-50 translate-middle px-0">
                                <div class="row">
                                    <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-10 col-sm-10 col-10 py-2 mx-auto fondo-imagen" style="background-image: url({{ asset('img/photos/blog/'.$blog->portada) }});"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-11 col-sm-11 col-11 mx-auto py-2 margen-tema" style="">
                            <div class="row">
                                <div class="col-10 mx-auto titulo-blog">
                                    <div class="row">
                                        <!-- <div class="col-5"></div> -->
                                        <div class="col-12 py-3 text-end" style="color: {{ $blog->color }};">
                                            {{ $blog->titulo }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-9" style="border: 1px solid {{ $blog->color }};"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-11 py-4 texto-blog">
                                            {{ $blog->resumen }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-5 col-xl-5 col-lg-3 col-md-3 col-sm-3 col-12"></div>
                                        <div class="col-xxl-7 col-xl-7 col-lg-9 col-md-9 col-sm-9 col-12 mx-xxl-0 mx-xl-0 mx-lg-0 mx-md-0 mx-sm-auto mx-auto text-center">
                                            <a href="#" class="btn btn-outline py-3 fs-5 rounded-pill w-100 boton-blog" style="color: {{ $blog->color }}; border: 1px solid #BCBCBC;">
                                                <div class="row">
                                                    <div class="col-11 mx-auto">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                LEER MÁS
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="2rem" width="3rem" fill="{{ $blog->color }}" viewBox="0 0 448 512">
                                                                    <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center align-items-center flex-column position-absolute start-0 top-0 bottom-0 cuadr z-3">
                        <a href="{{ route('config.blog.edit', ['id' => $blog->id]) }}" class="btn btn-outline" style="font-size: 40px;">Editar Post</a>
                    </div>
                </div>
            </div>
            
        @endif
    
        @php
            $cont++;
        @endphp
    @endforeach
</div>
@endsection
@section('jsLibExtras2')

@endsection
@section('jqueryExtra')

@endsection



