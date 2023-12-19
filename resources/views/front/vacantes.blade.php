@extends('layouts.front')

@section('title', 'Vacantes')

@section('cssExtras')
    <link rel="stylesheet" href="{{ asset('css/front/bolsa_trabajo.css') }}">
@endsection

@section('styleExtras')

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-11 text-center titulo-bolsa">
            CONOCE sobre nuestra BOLSA DE TRABAJO
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-11 col-11 mx-auto text-center texto-bolsa">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione voluptas corrupti, reiciendis labore quae eos est veniam, quidem perferendis odit iusto fugit recusandae accusantium facere, mollitia fugiat architecto numquam dolorum.
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row py-5">
        <div class="col imagen-vacantes" style="background-image: url('{{ asset('img/images/bolsa_trabajo/para_vacantes2.png') }}');"></div>
    </div>
    
 
            <div class="row py-5">
                <div class="col-xxk-11 col-xl-11 col-lg-11 col-md-12 col-sm-12 col-12 mx-auto">
                    
                    <div class="row">
                        <div class="servicios">

                            <div class="col-3">
                                <div class="card position-relative carta border-0" style="background-color: #CDE700;">
                                    <div class="card-img-overlay" style="
                                        background-image: url('https://picsum.photos/200');
                                    ">
                                    </div>
                                    <div class="card-body">
                                        <small class="card-orden">01</small>
                                        <h3 class="card-title p-0 m-0">VACANTE</h3>
                                        <p class="card-text">
                                            Somos un medio de alta exposición y gran impacto con alto flujo vehicular. 
                                            Tenemos carteleras en las principal avenidas del país logrando una visualización del medio forzosa. 
                                            Contamos con más de 3500 caras de exhibición, estructuras de calidad, iluminadas, con altura y posición, logrando el mayor impacto visual.
                                            
                                        </p>
                                    </div>
                                    <div class="position-relative cont-btn">
                                        <div class="card bg-transparent border-0 ms-4 position-absolute bottom-0 start-0 translate-middle-y">
                                            <div class="row">
                                                <div class="col-xxl-4 link-servicio">
                                                    <a href="#" class="text-center  rounded-circle">
                                                        <img src="{{ asset('img/images/3my-imagetct2.png') }}" alt="right-up" class="img-fluid btn-serv rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card position-relative carta border-0" style="background-color: #CCAEEC;">
                                    <div class="card-img-overlay" style="
                                        background-image: url('https://picsum.photos/200');
                                    ">
                                    </div>
                                    <div class="card-body">
                                        <small class="card-orden">02</small>
                                        <h3 class="card-title p-0 m-0">VACANTE</h3>
                                        <p class="card-text">
                                            Somos un medio de alta exposición y gran impacto con alto flujo vehicular. 
                                            Tenemos carteleras en las principal avenidas del país logrando una visualización del medio forzosa. 
                                            Contamos con más de 3500 caras de exhibición, estructuras de calidad, iluminadas, con altura y posición, logrando el mayor impacto visual.
                                        </p>
                                    </div>
                                    <div class="position-relative cont-btn">
                                        <div class="card bg-transparent border-0 ms-4 position-absolute bottom-0 start-0 translate-middle-y">
                                            <div class="row">
                                                <div class="col-xxl-4 link-servicio">
                                                    <a href="#" class="text-center  rounded-circle">
                                                        <img src="{{ asset('img/images/3my-imagetct2.png') }}" alt="right-up" class="img-fluid btn-serv rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card position-relative carta border-0" style="background-color: #FE6E63;">
                                    <div class="card-img-overlay" style="
                                        background-image: url('https://picsum.photos/200');
                                    ">
                                    </div>
                                    <div class="card-body">
                                        <small class="card-orden">03</small>
                                        <h3 class="card-title p-0 m-0">VACANTE</h3>
                                        <p class="card-text">
                                            Somos un medio de alta exposición y gran impacto con alto flujo vehicular. 
                                            Tenemos carteleras en las principal avenidas del país logrando una visualización del medio forzosa. 
                                            Contamos con más de 3500 caras de exhibición, estructuras de calidad, iluminadas, con altura y posición, logrando el mayor impacto visual.
                                        </p>
                                    </div>
                                    <div class="position-relative cont-btn">
                                        <div class="card bg-transparent border-0 ms-4 position-absolute bottom-0 start-0 translate-middle-y">
                                            <div class="row">
                                                <div class="col-xxl-4 link-servicio">
                                                    <a href="#" class="text-center  rounded-circle">
                                                        <img src="{{ asset('img/images/3my-imagetct2.png') }}" alt="right-up" class="img-fluid btn-serv rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card position-relative carta border-0" style="background-color: #FFC000;">
                                    <div class="card-img-overlay" style="
                                        background-image: url('https://picsum.photos/200');
                                    ">
                                    </div>
                                    <div class="card-body">
                                        <small class="card-orden">04</small>
                                        <h3 class="card-title p-0 m-0">VACANTE</h3>
                                        <p class="card-text">
                                            Somos un medio de alta exposición y gran impacto con alto flujo vehicular. 
                                            Tenemos carteleras en las principal avenidas del país logrando una visualización del medio forzosa. 
                                            Contamos con más de 3500 caras de exhibición, estructuras de calidad, iluminadas, con altura y posición, logrando el mayor impacto visual.
                                        </p>
                                    </div>
                                    <div class="position-relative cont-btn">
                                        <div class="card bg-transparent border-0 ms-4 position-absolute bottom-0 start-0 translate-middle-y">
                                            <div class="row">
                                                <div class="col-xxl-4 link-servicio">
                                                    <a href="#" class="text-center  rounded-circle">
                                                        <img src="{{ asset('img/images/3my-imagetct2.png') }}" alt="right-up" class="img-fluid btn-serv rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card position-relative carta border-0" style="background-color: #FFC000;">
                                    <div class="card-img-overlay" style="
                                        background-image: url('https://picsum.photos/200');
                                    ">
                                    </div>
                                    <div class="card-body">
                                        <small class="card-orden">05</small>
                                        <h3 class="card-title p-0 m-0">VACANTE</h3>
                                        <p class="card-text">
                                            Somos un medio de alta exposición y gran impacto con alto flujo vehicular. 
                                            Tenemos carteleras en las principal avenidas del país logrando una visualización del medio forzosa. 
                                            Contamos con más de 3500 caras de exhibición, estructuras de calidad, iluminadas, con altura y posición, logrando el mayor impacto visual.
                                        </p>
                                    </div>
                                    <div class="position-relative cont-btn">
                                        <div class="card bg-transparent border-0 ms-4 position-absolute bottom-0 start-0 translate-middle-y">
                                            <div class="row">
                                                <div class="col-xxl-4 link-servicio">
                                                    <a href="#" class="text-center  rounded-circle">
                                                        <img src="{{ asset('img/images/3my-imagetct2.png') }}" alt="right-up" class="img-fluid btn-serv rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card position-relative carta border-0" style="background-color: #FFC000;">
                                    <div class="card-img-overlay" style="
                                        background-image: url('https://picsum.photos/200');
                                    ">
                                    </div>
                                    <div class="card-body">
                                        <small class="card-orden">06</small>
                                        <h3 class="card-title p-0 m-0">VACANTE</h3>
                                        <p class="card-text">
                                            Somos un medio de alta exposición y gran impacto con alto flujo vehicular. 
                                            Tenemos carteleras en las principal avenidas del país logrando una visualización del medio forzosa. 
                                            Contamos con más de 3500 caras de exhibición, estructuras de calidad, iluminadas, con altura y posición, logrando el mayor impacto visual.
                                        </p>
                                    </div>
                                    <div class="position-relative cont-btn">
                                        <div class="card bg-transparent border-0 ms-4 position-absolute bottom-0 start-0 translate-middle-y">
                                            <div class="row">
                                                <div class="col-xxl-4 link-servicio">
                                                    <a href="#" class="text-center  rounded-circle">
                                                        <img src="{{ asset('img/images/3my-imagetct2.png') }}" alt="right-up" class="img-fluid btn-serv rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card position-relative carta border-0" style="background-color: #FFC000;">
                                    <div class="card-img-overlay" style="
                                        background-image: url('https://picsum.photos/200');
                                    ">
                                    </div>
                                    <div class="card-body">
                                        <small class="card-orden">05</small>
                                        <h3 class="card-title p-0 m-0">VACANTE</h3>
                                        <p class="card-text">
                                            Somos un medio de alta exposición y gran impacto con alto flujo vehicular. 
                                            Tenemos carteleras en las principal avenidas del país logrando una visualización del medio forzosa. 
                                            Contamos con más de 3500 caras de exhibición, estructuras de calidad, iluminadas, con altura y posición, logrando el mayor impacto visual.
                                        </p>
                                    </div>
                                    <div class="position-relative cont-btn">
                                        <div class="card bg-transparent border-0 ms-4 position-absolute bottom-0 start-0 translate-middle-y">
                                            <div class="row">
                                                <div class="col-xxl-4 link-servicio">
                                                    <a href="#" class="text-center  rounded-circle">
                                                        <img src="{{ asset('img/images/3my-imagetct2.png') }}" alt="right-up" class="img-fluid btn-serv rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
        <div class="col-10 mx-auto beneficio-titulo">
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
            <div class="beneficio-col {{ (($cont == 0 || $cont == 1) ? "col-6" : (($cont == 2) ? "col-7" : (($cont == 3) ? "col-8": "col-9"))) }}">
                {{ $ben->beneficio }}
            </div>
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 col-2 ms-3 d-flex abengn-content-start justify-content-start rounded-circle">
                <div class="beneficio-color position-relative" style="background-color: {{ $ben->color }};">
                    <div class="beneficio-icono position-absolute top-50 start-50 translate-middle" style="background-image: url('{{ asset($ben->icono) }}');"></div>
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
                    <div class="col text-center titulo-bolsa">
                        Postúlate con NOSOTROS                           
                    </div>
                </div>
            </div>
        </div>
        <div class="row formu-grande pb-5" data-aos="zoom-in">
            <form action="" id="form-grande">
                <div class="col-11 mx-auto">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-9 mx-auto position-relative">
                            <div class="col-12">
                                <div class="row mt-5 mb-5">
                                    <div class="col-xxl-8 col-xl-8 col-lg-10 fs-5 mx-auto" style="line-height: 1.1;">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa, saepe! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, adipisci!
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-xxl-8 col-xl-8 col-lg-10 mx-auto text-center">
                                        <button type="button" id="fileButton" class="btn btn-outline rounded-pill py-3 w-100" style="background-color: #201E1F; color: #FFC000;">
                                            <div class="row">
                                                <div class="col-8 text-end position-relative">
                                                    ADJUNTAR C.V.
                                                    <div class="col-4 text-end position-absolute top-50 start-100 translate-middle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" fill="#FFC000" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V299.6l-94.7 94.7c-8.2 8.2-14 18.5-16.8 29.7l-15 60.1c-2.3 9.4-1.8 19 1.4 27.8H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"/></svg>
                                                    </div>
                                                </div>
                                            </div>    
                                        </button>
                                        <input type="file" id="fileInput" style="display: none;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-8 col-xl-8 col-lg-10 mx-auto text-center">
                                        <button type="submit" class="btn btn-outline rounded-pill py-3 w-100" style="background-color: #201E1F; color: #FFC000;">
                                            <div class="row">
                                                <div class="col-8 text-end position-relative">
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
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Vacante" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Mensaje" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>

        <div class="row formu-small pb-5" data-aos="zoom-in" style="background-color: #FFFFFF;">
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
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Vacante" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Mensaje" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-md-9 col-sm-12 col-12 mx-auto position-relative">
                            <div class="row mt-5 mb-5">
                                <div class="col-xxl-9 col-xl-9 col-lg-10 fs-5 mx-auto" style="line-height: 1.1;">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa, saepe! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, adipisci!
                                </div>
                            </div>
                
                            <div class="row mb-3 mt-3">
                                <div class="col-md-6 col-sm-9 col-10 mx-auto text-center">
                                    <button type="submit" class="btn btn-outline rounded-pill py-3 w-100" style="background-color: #201E1F; color: #FFC000;">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8 col-8 text-end position-relative">
                                                ADJUNTAR C.V.
                                                <div class="col-4 text-end position-absolute top-50 start-100 translate-middle">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" fill="#FFC000" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V299.6l-94.7 94.7c-8.2 8.2-14 18.5-16.8 29.7l-15 60.1c-2.3 9.4-1.8 19 1.4 27.8H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"/></svg>
                                                </div>
                                            </div>
                                        </div>    
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-9 col-10 mx-auto text-center">
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
                return '<span class="mayuscula">' + palabra + '</span>';
            } else {
                return '<span class="minuscula">' + palabra + '</span>';
            }
        });

        // Actualiza el contenido con los estilos aplicados
        tituloBolsa.innerHTML = resultado.join(' ');
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
</script>
@endsection
