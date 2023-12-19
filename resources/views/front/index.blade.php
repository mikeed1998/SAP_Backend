@extends('layouts.front')

@section('title', 'Home')

@section('cssExtras')
    <link rel="stylesheet" href="{{ asset('css/front/index.css') }}">
@endsection

@section('styleExtras')

@endsection

@section('content')

    <section data-aos="fade-zoom-in"
     data-aos-easing="ease-in-back" 
     data-aos-delay="300"
     data-aos-offset="0" style="background-color: #201E1F;">
        <div class="container-fluid py-5" style="background-color: #201E1F;">
            <div class="row py-5">
                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-11 col-11 titulo-pri mx-auto fw-bold text-end titulo-index">
                    ELEVA la presencia de tu EMPRESA
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-8 col-sm-11 col-11 py-4 mx-auto text-white texto-ind">
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt temporibus tempora minima quos, dolor nesciunt impedit magnam inventore deleniti explicabo.
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

    <section data-aos="fade-up"
     data-aos-anchor-placement="center-bottom"  style="background-color: #201E1F;">
        <div class="container-fluid mt-0">
            <div class="row">
                <div class="slider-principal px-0">
                    <div class="col-12 imagen-slider" style="
                        background-image: url('https://picsum.photos/1200/1000');
                    "></div>
                    <div class="col-12 imagen-slider" style="
                        background-image: url('https://picsum.photos/1200/1000');
                    "></div>
                    <div class="col-12 imagen-slider" style="
                        background-image: url('https://picsum.photos/1200/1000');
                    "></div>
                    <div class="col-12 imagen-slider" style="
                        background-image: url('https://picsum.photos/1200/1000');
                    "></div>
                </div>
            </div>
        </div>
    </section>

    <section data-aos="zoom-in" data-aos-delay="500"  style="background-color: #201E1F;">
        <div class="container-fluid contenedor-serv py-5">
            <div class="row py-5">
                <div class="col-xxk-11 col-xl-11 col-lg-11 col-md-12 col-sm-12 col-12 mx-auto">
                    <div class="row">
                        <div class="col fw-bold display-2 text-white py-4 serv-ttt">
                            Servicios
                        </div>
                    </div>
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
                                        <h3 class="card-title p-0 m-0">CARTELEREA</h3>
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
                                        <h3 class="card-title p-0 m-0">PUENTES</h3>
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
                                        <h3 class="card-title p-0 m-0">PANTALLA DIGITAL</h3>
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
                                        <h3 class="card-title p-0 m-0">MUROS</h3>
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
                                        <h3 class="card-title p-0 m-0">AUTOBUSES</h3>
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
                                        <h3 class="card-title p-0 m-0">VALLA MÓVIL</h3>
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
                                        <h3 class="card-title p-0 m-0">MUPIS</h3>
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
                    <div class="col-12 position-absolute" style="margin-top: 40rem;">
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
                    <div class="col-12 position-absolute" style="margin-top: 24rem;">
                        <div class="row">
                            <div class="col-8 py-2"></div>
                            <div class="col-4 position-relative p-0 m-0 py-2 z-3">
                                <img src="{{ asset('img/images/home/contador.png') }}" alt="" class="img-fluid">
                                <div class="col-11 text-center position-absolute top-50 start-50 translate-middle">
                                    <div class="row">
                                        <div class="col-9 fw-bolder text-center">
                                            <p id="contador_clientes" class="contad"></p>
                                        </div>
                                        <div class="col-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8"></div>
                            <div class="col-4 fs-3 fw-bolder z-3" style="line-height: 1; color: #FE6E63;">
                                CIUDADES Y SEGUIMOS CRECIENDO
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-9 col-sm-11 col-11 position-relative mx-auto">
                            <div class="col-12 position-absolute top-0 start-50 translate-middle z-3" style="margin-top: 2rem;">
                                <div class="card" style="border-color: #ffffff; border-top-left-radius: 32px; border-top-right-radius: 32px; border-bottom-left-radius: 0px; border-bottom-right-radius: 32px; box-shadow: 0 0 30px rgba(0, 0, 0, 0.5); padding: 1rem;">
                                    <div class="card-body letrero">
                                        Somos una empres con más de 25 años de experiencia en el medio de publicidad exterior, ofreciendo un servicio completo de publicidad a través de medios exteriores como:
                                        Espectaculares, muros, pantallas digitales, mupies, transporte público, vallas móviles, puentes peatonales y vehiculares, centros comerciales y aeropuertos.
                                        Con cobertura nacional en las principales ciudades del país. 
                                        Siendo un medio único que permite un gran alcance, gran impacto, cobertura, calidad y experiencia, siendo un medio único por excelencia. 
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
                                    <div class="col-xxl-10 col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 position-relative mx-auto circulo-imagen" style="background-image: url('{{ asset('img/images/home/index1.png') }}'); background-color: #CDE700;">
                                        <div class="col-11 ms-5 position-absolute top-0 start-0 mt-5">
                                            <h2><span><span>Tu campaña merce la mejor ubicación</span></span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-baja" data-aos="zoom-in" data-aos-delay="100"> 
                                <div class="row">
                                    <div class="col-xxl-10 col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 position-relative mx-auto circulo-imagen" style="background-image: url('{{ asset('img/images/home/index2.png') }}'); background-color: #CCAEEC;">
                                        <div class="col-11 ms-5 position-absolute top-0 start-0 mt-5">
                                            <h2><span><span>Diariamente millones de consumidores circulan por nuestras ubicaciones</span></span></h2>
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
                                        <div class="col-11 ms-5 position-absolute top-0 start-0 mt-5">
                                            <h2><span><span>Ponemos tu publicidad en lo más alto</span></span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-baja" data-aos="zoom-in" data-aos-delay="100">
                                <div class="row">
                                    <div class="col-xxl-10 col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 position-relative mx-auto circulo-imagen" style="background-image: url('{{ asset('img/images/home/index4.png') }}'); background-color: #A2E9FF;">
                                        <div class="col-11 ms-5 position-absolute top-0 start-0 mt-5">
                                            <h2><span><span>75% de las personas recuerdan las marcas</span></span></h2>
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
                            <div class="card-body fs-2 text-center" style="line-height: 1;">
                            SAP te hace llegar a millones de consumidores en movimiento dentro de las ciudades más importantes del país las 24 horas del día, ofreciendote las mejores ubicaciones en rutas de alto flujo vehícular y peatonal.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" data-aos="zoom-in" style="margin-top: 9rem;">
                <div class="col-11 mx-auto">
                    <div class="row">
                        <div class="slider-clientes">
                            <div class="col imagen-cliente" style="
                                background-image: url('{{ asset('img/images/cocacola.png') }}');
                            "></div>
                            <div class="col imagen-cliente" style="
                                background-image: url('{{ asset('img/images/cocacola.png') }}');
                            "></div>
                            <div class="col imagen-cliente" style="
                                background-image: url('{{ asset('img/images/cocacola.png') }}');
                            "></div>
                            <div class="col imagen-cliente" style="
                                background-image: url('{{ asset('img/images/cocacola.png') }}');
                            "></div>
                            <div class="col imagen-cliente" style="
                                background-image: url('{{ asset('img/images/cocacola.png') }}');
                            "></div>
                            <div class="col imagen-cliente" style="
                                background-image: url('{{ asset('img/images/cocacola.png') }}');
                            "></div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="row mt-5" data-aos="zoom-in">
                <div class="col mt-5 py-5">
                    <div class="row">
                        <div class="col text-center display-1 fw-bolder">
                            Déjanos un mensaje, nos ponemos en contacto
                        </div>
                    </div>
                </div>
            </div>
            <div class="row formu-grande pb-5" data-aos="zoom-in">
                <form action="" id="form-grande">
                    <div class="col-11 mx-auto">
                        <div class="row">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-9 mx-auto position-relative">
                                <div class="col-12 posicion position-absolute bottom-0 start-50 translate-middle">
                                    <div class="row">
                                        <div class="col-xxl-8 col-xl-8 col-lg-9 mx-auto text-center">
                                            <button type="submit" class="btn btn-outline rounded-pill py-2 w-100" style="background-color: #201E1F; color: #FFC000;">
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
    </section>

    <!-- Modal -->
    <div class="modal fade" style="z-index: 9999;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    
                </div>
                <div class="modal-body">
                    <div class="container bg-secondary border-dark">
                        <div class="row">
                            <div class="col-6 border-dark">

                            </div>
                            <div class="col-6 border-dark">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('jqueryExtra')
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
            var modalHeader = $('.modal-header');
            var modalBody = $('.modal-body');
            modalHeader.html("<p style='font-size: 2rem; font-weight: 500;'>Nuestras sucursales en " + stateName + "</p>" + 
                             "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>");
            // Set the content of the modal body
            modalBody.html('<div class="container-fluid border border-dark">' +
                               '<div class="row">' +
                                   '<div class="col-6 border border-dark py-5">'+ 
                                        'Lista de sucursales' +
                                    '</div> ' + 
                                    '<div class="col-6 border border-dark py-5"> ' + 
                                        ' Carrusel de fotos ' +
                                    '</div> ' + 
                                '</div> ' + 
                            '</div>');

            // Show the modal
            $('#exampleModal').modal('show');
        });
    });

</script>

<div class="container border border-dark">
    <div class="row">
        <div class="col-6 border border-dark py-5">

        </div>
        <div class="col-6 border border-dark py-5">

        </div>
    </div>
</div>

@endsection
