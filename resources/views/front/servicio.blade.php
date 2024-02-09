@extends('layouts.front')

@section('title', 'Servicio')

@section('cssExtras')
    <link rel="stylesheet" href="{{ asset('css/front/servicio.css') }}">
@endsection

@section('styleExtras')
<style>
    @font-face {
        font-family: 'Sansation Bold';
        font-style: normal;
        font-weight: normal;
        src: url('/fonts/Sansation-Bold/sansation-bold.ttf') format('ttf');
    }
</style>
@endsection

@section('content')

<section>
    <div class="container-fluid bg-dark">
        <div class="row">
            <div class="col fondo position-relative">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-9 col-11 py-5 position-absolute z-3 top-0 start-0">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-9 mx-auto">
                            <div class="row">
                                <div class="col text-start display-3 fw-bolder text-white" style=" font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bold;">
                                    {{ $servicio->titulo }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-1 fs-5 fw-normal text-white text-start text-cont1" style="line-height: 1.1; font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bold;">
                                    {{ $servicio->descripcion }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 py-5 position-absolute z-1 top-50 start-50 translate-middle">
                    <div class="row">
                        <div class="col position-relative">
                            <div class="col-12 position-absolute top-50 start-50 translate-middle portada-servicio" style="
                                border-radius: 100%;
                                background-image: url('{{ asset('img/photos/servicios/'.$servicio->imagen) }}');
                            "></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-9 col-11 py-5 position-absolute z-3 bottom-0 end-0">
                    <div class="row">
                        <div class="col-11 mx-auto">s
                            <div class="row">
                                <div class="col-11 mx-auto py-1 fs-5 fw-normal text-end text-white text-cont2" style="line-height: 1.1; font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bold; max-height: 6rem; overflow: auto;">
                                    {{ $servicio->descripcion2 }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-11 mx-auto text-center py-2 mt-2">
                                    <a href="#" class="btn btn-outline py-3 fs-5 fw-bolder bg-white border border-white rounded-pill w-100 text-dark" style="font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bold;">
                                        COTIZAR AQUÍ <svg xmlns="http://www.w3.org/2000/svg" height="1.4rem" width="5rem" fill="#000000" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                                    </a>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col col-pri position-relative">
                <div class="col-12 position-absolute top-0 start-0 z-3">
                    <div class="row">

                        <div uk-slider="autoplay: true; autoplay-interval: 1000">
                            <ul class="uk-slider-items uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1@s">

                                @foreach ($proyectos as $proye)
                                    @if ($proye->servicio == $servicio->id)
                                    <li>
                                        <div class="col-12 px-3 py-1">
                                            <div class="card carta-imagen border-0 rounded-0" style="background-image: url('{{ asset('img/photos/proyectos/'.$proye->portado) }}');">
                                                <div class="overlay" style="background-color: #FFC000;">
                                                    <div class="row">
                                                        <div class="col position-relative" >
                                                            <div class="col-12 p-4 position-absolute top-0 text-start fw-bolder titulo-card" style="font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bold;">
                                                                {{ $proye->titulo }}
                                                            </div>
                                                            <div class="col-11 p-4 position-absolute top-0 mar-text">
                                                                <div class="row">
                                                                    <div class="col-2"></div>
                                                                    <div class="col-10 text-end fw-bolder texto-card" style="font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bold;">
                                                                        {{ $proye->descripcion }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-white contenedor-dots">
            <div class="col py-4 position-relative">
                <div class="col-9 mb-4 position-absolute bottom-0 start-50 translate-middle">
                    <div class="row">
                        <div class="col text-center">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('jsLibExtras2')
@endsection