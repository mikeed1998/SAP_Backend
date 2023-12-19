@extends('layouts.front')

@section('title', 'Servicio')

@section('cssExtras')
    <link rel="stylesheet" href="{{ asset('css/front/servicio.css') }}">
@endsection

@section('styleExtras')
@endsection

@section('content')

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col px-0 portada-servicio position-realtive" style="background-image: url('{{ asset('img/images/servicio/portada2.png') }}');">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 py-5 position-absolute">
                    <div class="row">
                        <div class="col-9 mx-auto">
                            <div class="row">
                                <div class="col text-start display-1 fw-bolder text-white">
                                    Servicio
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-1 fs-5 fw-normal text-white text-start" style="line-height: 1.1;">
                                    Lorem Dicta, possimus! Lorem, ipsum dolor. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque, est. sit amet consectetur adipisicing elit. Dicta placeat commodi animi dolores! Esse, labore. Placeat sunt tempora repudiandae iusto.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 py-5 position-absolute top-100 end-0 cont-izq">
                    <div class="row">
                        <div class="col-9 mx-auto">
                            <div class="row">
                                <div class="col py-1 fs-5 fw-normal text-white text-start" style="line-height: 1.1;">
                                    Lorem Dicta, possimus! Lorem, ipsum dolor. Atque, est. Dicta placeat Esse, labore. Placeat sunt tempora repudiandae iusto.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mx-xxl-0 mx-xl-0 mx-lg-0 mx-md-0 mx-sm-auto mx-auto text-center py-4">
                                    <a href="#" class="btn btn-outline py-2 fs-5 fw-bolder bg-white border border-white rounded-pill w-100 text-dark">
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

                        <div uk-slider>
                            <ul class="uk-slider-items uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1@s">

                                @for($i = 0; $i < 4; $i++)
                                            <li>
                                                <div class="col-12 px-3 py-1">
                                                    <div class="card carta-imagen border-dark border-1 rounded-0" style="background-image: url('{{ asset('img/images/servicio/ser1.png') }}');">
                                                        <div class="overlay">
                                                            <div class="row">
                                                                <div class="col position-relative">
                                                                    <div class="col-12 px-3 py-2 position-absolute top-0 text-start fw-bolder titulo-card">
                                                                        Título del proyecto realizado
                                                                    </div>
                                                                    <div class="col-11 px-3 py-2 position-absolute top-0 mar-text">
                                                                        <div class="row">
                                                                            <div class="col-2"></div>
                                                                            <div class="col-10 text-end fw-bolder" style="line-height: 1.1;">
                                                                                Lorem ipsum dolor sit amet consectetur. Officia iste voluptatibus asperiores iure ex. Facere quod eos possimus natus nulla.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                @endfor
                            </ul>
                        </div>

         
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-white contenedor-dots">
            <div class="col py-4 position-relative">
                <div class="col-9 mb-4 border border-primary position-absolute bottom-0 start-50 translate-middle">
                    <div class="row">
                        <div class="col text-center">
                            * * *
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
