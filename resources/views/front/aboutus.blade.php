@extends('layouts.front')

@section('title', 'Nosotros')

@section('cssExtras')

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

    /* Estilo para el acordeón */
    .accordion-item {
        border: 1px solid #ccc;
        margin-bottom: 5px;
    }

    /* Estilo para el encabezado del acordeón */
    .accordion-header {
        color: #fff;
        padding: 10px;
        cursor: pointer;
        border-radius: 2rem;
    }

    /* Estilo para el contenido del acordeón */
    .accordion-content {
        display: none;
        padding: 10px;
    }

    .input-home_contacto {
        padding-left: 3rem;
        color: var(--azul-titulos);
    }

    .input-home_contacto:focus {
        color: var(--azul-titulos);
    }

    .input-home_contacto::placeholder {
        color: var(--azul-titulos);
    }

    /* Estilo para el acordeón */
    .accordion-item {
        border: 1px solid #ccc;
        margin-bottom: 5px;
    }

    /* Estilo para el encabezado del acordeón */
    .accordion-header {
        background-color: #E40821;
        color: #fff;
        padding: 10px;
        cursor: pointer;
        border-radius: 2rem;
    }

    /* Estilo para el contenido del acordeón */
    .accordion-content {
        display: none;
        padding: 10px;
    }

    @media(min-width: 1800px) {
        .solucion-card {
            border-radius: 0; 
            background-position: center center;
            background-repeat: no-repeat;
            width: 33rem;
            height: 33rem;
        }

        .card-hover {
            display: none;
        }

        .solucion-card:hover .card-hover {
            display: block;
        }

        .titulo-solucion {
            color: var(--azul-titulos);
            font-size: 2rem;
        }

        .portada-subdistribuidor {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            border: 0px solid black;
            border-bottom-left-radius: 50%;
            border-bottom-right-radius: 50%;
            width: 100%;
            height: 54rem;
        }

        .titulo-home_contacto {
            font-size: 4rem;
        }

        .home-img_contacto {
            background-position: left center;
            background-repeat: no-repeat;
            height: 40rem;
            width: 100%;
        }

        .responsive-text {
            font-size: 3rem;
        }

        .responsive-text_accordion {
            font-size: 1.5rem;
        }

        #arrowImage {
            margin-top: 0.5rem;
        }

        .img-nosotros {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 36rem;
        }
    }

    /* xxl */
    @media (min-width: 1400px) and (max-width: 1799px) {
        .solucion-card {
            border-radius: 0; 
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            width: 24rem;
            height: 24rem;
        }

        .card-hover {
            display: none;
        }

        .solucion-card:hover .card-hover {
            display: block;
        }

        .titulo-solucion {
            color: var(--azul-titulos);
            font-size: 1.6rem;
        }

        .portada-subdistribuidor {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            border: 0px solid black;
            border-bottom-left-radius: 50%;
            border-bottom-right-radius: 50%;
            width: 100%;
            height: 44rem;
        }

        .titulo-home_contacto {
            font-size: 3.8rem;
        }

        .home-img_contacto {
            background-position: left center;
            background-repeat: no-repeat;
            height: 37rem;
            width: 100%;
        }

        .responsive-text {
            font-size: 2.6rem;
        }

        .responsive-text_accordion {
            font-size: 1.5rem;
        }

        #arrowImage {
            margin-top: 0.2rem;
        }

        .img-nosotros {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 32rem;
        }
    }

    /* xl */
    @media (min-width: 1200px) and (max-width: 1400px) {
        .solucion-card {
            border-radius: 0; 
            background-position: center center;
            background-repeat: no-repeat;
            width: 20rem;
            height: 20rem;
        }

        .card-hover {
            display: none;
        }

        .solucion-card:hover .card-hover {
            display: block;
        }

        .titulo-solucion {
            color: var(--azul-titulos);
            font-size: 1.2rem;
        }

        .portada-subdistribuidor {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            border: 0px solid black;
            border-bottom-left-radius: 50%;
            border-bottom-right-radius: 50%;
            width: 100%;
            height: 44rem;
        }

        .titulo-home_contacto {
            font-size: 3rem;
        }

        .home-img_contacto {
            background-position: left center;
            background-repeat: no-repeat;
            height: 36rem;
            width: 100%;
        }

        .responsive-text {
            font-size: 2.6rem;
        }

        .responsive-text_accordion {
            font-size: 1.5rem;
        }

        .img-nosotros {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 28rem;
        }
    }

    /* lg */
    @media (min-width: 992px) and (max-width: 1200px) {
        .solucion-card {
            border-radius: 0; 
            background-position: center center;
            background-repeat: no-repeat;
            width: 20rem;
            height: 20rem;
        }

        .card-hover {
            display: none;
        }

        .solucion-card:hover .card-hover {
            display: block;
        }

        .titulo-solucion {
            color: var(--azul-titulos);
            font-size: 1.2rem;
        }

        .portada-subdistribuidor {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            border: 0px solid black;
            border-bottom-left-radius: 50%;
            border-bottom-right-radius: 50%;
            width: 100%;
            height: 40rem;
        }

        .titulo-home_contacto {
            font-size: 2.6rem;
        }

        .home-img_contacto {
            background-position: left center;
            background-repeat: no-repeat;
            height: 32rem;
            width: 100%;
        }

        .responsive-text {
            font-size: 2rem;
        }

        .responsive-text_accordion {
            font-size: 1.3rem;
        }

        .img-nosotros {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 24rem;
        }
    }

    /* md */
    @media (min-width: 768px) and (max-width: 992px) {
        .solucion-card {
            border-radius: 0; 
            background-position: center center;
            background-repeat: no-repeat;
            width: 23rem;
            height: 23rem;
        }

        .card-hover {
            display: none;
        }

        .solucion-card:hover .card-hover {
            display: block;
        }

        .titulo-solucion {
            color: var(--azul-titulos);
            font-size: 1.4rem;
        }

        .portada-subdistribuidor {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            border: 0px solid black;
            border-bottom-left-radius: 50%;
            border-bottom-right-radius: 50%;
            width: 100%;
            height: 36rem;
        }

        .titulo-home_contacto {
            font-size: 2.6rem;
        }

        .home-img_contacto {
            background-position: left center;
            background-repeat: no-repeat;
            height: 45rem;
            width: 100%;
        }

        .home-img_contacto--container {
            margin-top: 16rem;
        }

        .responsive-text {
            margin-top: .5rem;
            font-size: 1.6rem;
        }

        .responsive-text_accordion {
            font-size: 1.3rem;
        }

        .img-nosotros {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 20rem;
        }
    }

    /* sm */
    @media (min-width: 576px) and (max-width: 768px) {
        .solucion-card {
            border-radius: 0; 
            background-position: center center;
            background-repeat: no-repeat;
            width: 26rem;
            height: 26rem;
        }

        .card-hover {
            display: none;
        }

        .solucion-card:hover .card-hover {
            display: block;
        }

        .titulo-solucion {
            color: var(--azul-titulos);
            font-size: 1.8rem;
        }

        .portada-subdistribuidor {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            border: 0px solid black;
            border-bottom-left-radius: 50%;
            border-bottom-right-radius: 50%;
            width: 100%;
            height: 24rem;
        }
        
        .titulo-home_contacto {
            font-size: 2.4rem;
        }

        .home-img_contacto {
            background-position: left center;
            background-repeat: no-repeat;
            height: 45rem;
            width: 100%;
        }

        .home-img_contacto--container {
            border-top-left-radius: 36%;
            margin-top: 16rem;
        }

        .responsive-text {
            font-size: 2rem;
        }

        .responsive-text_accordion {
            font-size: 1.2rem;
        }

        .img-nosotros {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 16rem;
        }
    }

    /* xs */
    @media (min-width: 0px) and (max-width: 576px) {
        .solucion-card {
            border-radius: 0; 
            background-position: center center;
            background-repeat: no-repeat;
            width: 23rem;
            height: 23rem;
        }

        .card-hover {
            display: none;
        }

        .solucion-card:hover .card-hover {
            display: block;
        }

        .titulo-solucion {
            color: var(--azul-titulos);
            font-size: 1.8rem;
        }

        .portada-subdistribuidor {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            border: 0px solid black;
            border-bottom-left-radius: 50%;
            border-bottom-right-radius: 50%;
            width: 100%;
            height: 18rem;
        }

        .titulo-home_contacto {
            font-size: 2.4rem;
        }

        .home-img_contacto {
            background-position: left center;
            background-repeat: no-repeat;
            height: 45rem;
            width: 100%;
        }

        .home-img_contacto--container {
            border-top-left-radius: 30%;
            border-top-right-radius: 30%;
            margin-top: 14rem;
        }

        .responsive-text {
            font-size: 1.6rem;
        }

        .responsive-text_accordion {
            font-size: 1.2rem;
        }

        .img-nosotros {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 12rem;
        }
    }

</style>

<div class="container-fluid px-0">
    <div class="row">
        <div class="col portada-subdistribuidor" style="
            background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[0]->imagen) }}');
        "></div>
    </div>
    <div class="row mt-5">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-11 col-xs-11 col-11 mx-auto mt-5 text-center display-3 fw-bolder" style="color: var(--azul-titulos); font-family:'Neusharp Bold';">
            NOSOTROS
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-10 col-xs-10 col-10 py-3 text-secondary mx-auto text-center" style="line-height: 1;">
            {{ $elements[1]->texto }}
        </div>        
    </div>
    <div class="row py-5">
        <div class="col-11 mx-auto">
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12 d-flex align-content-center justify-content-center mx-auto py-xxl-3 py-xl-2 py-lg-2 py-md-2 py-sm-2 py-xs-2 py-2">
                    <div class="card position-relative solucion-card border border-2" style="background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[3]->imagen) }}');">       
                        <div class="card-body">
                        </div>
                        <div class="card card-hover position-absolute bg-white start-0 top-0 bottom-0 end-0" style="border-radius: 0; border-bottom: 5px solid red;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 mt-5 text-center mx-auto">
                                                <img src="{{ asset('img/photos/imagenes_estaticas/'.$elements[2]->imagen) }}" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-center titulo-solucion fw-bolder py-3">
                                                {{ $elements[4]->texto }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xxl-9 col-xl-10 col-lg-11 col-md-11 col-sm-11 col-xs-11 col-11 text-secondary mx-auto text-center" style="line-height: 1;">
                                                {{ $elements[5]->texto }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12 d-flex align-content-center justify-content-center mx-auto py-xxl-3 py-xl-2 py-lg-2 py-md-2 py-sm-2 py-xs-2 py-2">
                    <div class="card position-relative solucion-card border border-2" style="background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[7]->imagen) }}');">       
                        <div class="card-body">
                        </div>
                        <div class="card card-hover position-absolute bg-white start-0 top-0 bottom-0 end-0" style="border-radius: 0; border-bottom: 5px solid red;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 mt-5 text-center mx-auto">
                                                <img src="{{ asset('img/photos/imagenes_estaticas/'.$elements[6]->imagen) }}" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-center titulo-solucion fw-bolder py-3">
                                                {{ $elements[8]->texto }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xxl-9 col-xl-10 col-lg-11 col-md-11 col-sm-11 col-xs-11 col-11 text-secondary mx-auto text-center" style="line-height: 1;">
                                                {{ $elements[9]->texto }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12 d-flex align-content-center justify-content-center mx-auto py-xxl-3 py-xl-2 py-lg-2 py-md-2 py-sm-2 py-xs-2 py-2">
                    <div class="card position-relative solucion-card border border-2" style="background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[11]->imagen) }}');">       
                        <div class="card-body">
                        </div>
                        <div class="card card-hover position-absolute bg-white start-0 top-0 bottom-0 end-0" style="border-radius: 0; border-bottom: 5px solid red;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 mt-5 text-center mx-auto">
                                                <img src="{{ asset('img/photos/imagenes_estaticas/'.$elements[10]->imagen) }}" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-center titulo-solucion fw-bolder py-3">
                                                {{ $elements[12]->texto }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xxl-9 col-xl-10 col-lg-11 col-md-11 col-sm-11 col-xs-11 col-11 text-secondary mx-auto text-center" style="line-height: 1;">
                                                {{ $elements[13]->texto }}
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
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-11 py-5 mx-auto">
            <div class="accordion">
                <div class="accordion-item border-0">
                    <div class="accordion-header" style="background-color: #E40821;">
                        <div class="row">
                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-9 col-sm-12 col-xs-12 col-12 text-xxl-center text-xl-end text-lg-center text-md-center text-sm-center text-xs-center text-center fw-bolder responsive-text" style="font-family:'Neusharp Bold';">
                            NECESIDADES PARA EL SECTOR HOGAR
                            </div>
                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-12 col-xs-12 col-12 text-center">
                                <img id="arrowImage" src="{{ asset('img/design/subdistribuidor/flecha.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div  class="accordion-content">

                        @foreach ($necesidades as $neh)
                            @if ($neh->tipo_sector == 1)
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-11 py-3 text-secondary mx-auto responsive-text_accordion">
                                                {{ $neh->necesidades }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col border-bottom border-2 border-danger"></div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach       
                        
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-11 py-5 mx-auto">
            <div class="accordion">
                <div class="accordion-item border-0">
                    <div class="accordion-header" style="background-color: var(--azul-titulos);">
                        <div class="row">
                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-9 col-sm-12 col-xs-12 col-12 text-xxl-center text-xl-end text-lg-center text-md-center text-sm-center text-xs-center text-center fw-bolder responsive-text" style="font-family:'Neusharp Bold';">
                                NECESIDADES PARA EL SECTOR PRIVADO
                            </div>
                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-12 col-xs-12 col-12 text-center">
                                <img id="arrowImage" src="{{ asset('img/design/nosotros/flecha2.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div  class="accordion-content">
                        @foreach ($necesidades as $neh2)
                            @if ($neh2->tipo_sector == 2)
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-11 py-3 text-secondary mx-auto responsive-text_accordion">
                                                {{ $neh2->necesidades }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col border-bottom border-2 border-danger"></div>
                                        </div>
                                    </div>
                                </div>
                            @endif    
                        @endforeach
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

<div class="container-fluid py-5 px-0">
    <div class="row">
        <div class="col img-nosotros" style="
            background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[14]->imagen) }}');
        "></div>
    </div>
    <div class="row">
        <div class="col">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-10 col-xs-10 col-10 py-5 text-secondary mx-auto text-center" style="line-height: 1;">
                {{ $elements[15]->texto }}
            </div>
        </div>
    </div>
</div>

@endsection

@section('jqueryExtra')
<script>
        
    document.addEventListener("DOMContentLoaded", function () {
    const accordionItems = document.querySelectorAll(".accordion-item");

    accordionItems.forEach((item) => {
        const header = item.querySelector(".accordion-header");
        const content = item.querySelector(".accordion-content");
        const arrowImage = item.querySelector("#arrowImage"); // Selecciona la imagen

        header.addEventListener("click", function () {
            if (content.style.display === "none" || content.style.display === "") {
                content.style.display = "block";
                // Invierte la imagen horizontalmente
                arrowImage.style.transform = "scaleY(-1)";
            } else {
                content.style.display = "none";
                // Restablece la transformación de la imagen
                arrowImage.style.transform = "scaleY(1)";
            }
        });
    });
});

</script>
@endsection
