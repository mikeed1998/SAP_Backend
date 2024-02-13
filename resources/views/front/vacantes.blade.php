
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


.column-container {
    position: relative;
    overflow: hidden;
    height: 4rem;
    width: 100%;
}

.top-left,
.top-right {
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background-color: #201E1F; /* Color de fondo de la columna */
}

.top-right {
    transform-origin: top left;
    transform: skewY(1.8deg); /* Ajusta el ángulo de inclinación según tus necesidades */
    background-color: #fff; /* Color de fondo de la parte inclinada */
}

.slick-dots {
    display: flex;
    justify-content: center;
    flex-direction: row; /* Asegura una disposición horizontal */
    list-style: none;
    padding: 0;
    margin: 20px 0; /* Ajusta el margen según tus necesidades */
}

.slick-dots li {
    margin: 0 10px;
}

.slick-dots li button {
    border: 1px solid #fff;
    background-color: #201E1F;
    width: 16px;
    color: transparent;
    height: 16px;
    border-radius: 100%;
    transition: background-color 0.3s;
}

.slick-dots li button:hover,
.slick-dots li button:focus {
    background-color: #FFC000;
}

input {
    font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bold;
}

@media(min-width: 1800px) {

    .titulo-bolsa, .titulo-bolsa2 {
        font-size: 8.6rem;
        font-weight: 500;
        line-height: 1.1;
    }

    .titulo-bolsa .mayuscula, .titulo-bolsa2 .mayuscula2 {
        color: #CDE700;
    }

    .titulo-bolsa .minuscula, .titulo-bolsa2 .minuscula2 {
        color: white;
    }

    .texto-bolsa {
        color: #BCBCBC;
        font-size: 2rem;
        line-height: 1;
        margin-top: 2rem;
    }

    .imagen-vacantes {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: contain;
        width: 100%;
        height: 66rem;
    }

    .beneficio-titulo {
        font-size: 6rem;
        font-weight: 700;
    }

    .beneficio-col {
        background-color: #201E1F;
        color: #FFFFFF;
        border-top-right-radius: 64px;
        border-bottom-right-radius: 64px;
        padding-left: 10rem;
        padding-top: 2.6rem;
        padding-bottom: 2.6rem;
        font-size: 2.6rem;
        text-align: left;
        font-weight: 500;
    }

    .beneficio-color {
        border-radius: 100%;
        height: 8.6rem;
        width: 8.6rem;
    }

    .beneficio-icono {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 5rem;
        height: 5rem;
    }

    .formu-grande {
        display: block;
    }

    .formu-small {
        display: none;
    }

    .servicios, .titulo-servicios {
        /* overflow: hidden; */
        width: 100%;
        /* left: 12rem; */
    }

    .cont-btn {
        margin-top: 7rem;
    }

    .link-servicio {
        margin-top: -7rem;
        padding: 0.7rem;
        width: 7.8rem;
    }

    .link-servicio:hover .img-fluid {
        box-shadow: 0 0 2rem rgba(0, 0, 255, 1); /* Ajusta el valor de azul y la opacidad según tus preferencias */
    }

    .carta {
        position: relative;
        overflow: hidden;
        border-radius: 3rem;
        padding-top: 2rem;
        padding-bottom: 1rem;
        padding-right: 1rem;
        padding-left: 1rem;
        /* margin-right: 1rem; */
        /* margin-left: 1rem; */
        margin-top: 2rem;
    }

    .carta:hover {
        transform: translateY(-2rem); /* Ajusta la cantidad de elevación según tus preferencias */
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); Agrega una sombra para dar un efecto elevado */
    }

    .card-img-overlay {
        background: rgba(0, 0, 0, 0.5); /* Cambia el color del overlay según tus preferencias */
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0; /* Inicialmente invisible */
        transition: opacity 0.3s ease;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        width: 100%;
        height: auto;
    }

    .carta:hover .card-img-overlay {
        opacity: 1; /* Hacer visible al pasar el cursor sobre la tarjeta */
    }

    .card-orden {
        font-size: 1.4rem;
        font-weight: 500;
    }

    .card-title {
        color: #000000;
        font-size: 2.8rem;
        font-weight: 700;
        height: 8rem;
        overflow: hidden;
    }

    .card-text {
        line-height: 1.2;
        text-align: justify;
        padding-top: 1rem;
        padding-bottom: 1rem;
        font-size: 1.3rem;
        font-weight: 500;
        color: black;
        height: 19.8rem;
        overflow: hidden;
    }

}

/* xxl */
@media (min-width: 1400px) and (max-width: 1799px) {

    .titulo-bolsa, .titulo-bolsa2 {
        font-size: 6.6rem;
        font-weight: 500;
        line-height: 1.1;
    }

    .titulo-bolsa .mayuscula, .titulo-bolsa2 .mayuscula2 {
        color: #CDE700;
    }

    .titulo-bolsa .minuscula, .titulo-bolsa2 .minuscula2 {
        color: white;
    }

    .texto-bolsa {
        color: #BCBCBC;
        font-size: 1.4rem;
        line-height: 1;
        margin-top: 2rem;
    }

    .imagen-vacantes {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: contain;
        width: 100%;
        height: 66rem;
    }

    .beneficio-titulo {
        font-size: 5rem;
        font-weight: 700;
    }

    .beneficio-col {
        background-color: #201E1F;
        color: #FFFFFF;
        border-top-right-radius: 64px;
        border-bottom-right-radius: 64px;
        padding-left: 10rem;
        padding-top: 2.6rem;
        padding-bottom: 2.6rem;
        font-size: 2.4rem;
        text-align: left;
        font-weight: 500;
    }

    .beneficio-color {
        border-radius: 100%;
        height: 8.6rem;
        width: 8.6rem;
    }

    .beneficio-icono {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 5rem;
        height: 5rem;
    }

    .formu-grande {
        display: block;
    }

    .formu-small {
        display: none;
    }

    .servicios, .titulo-servicios {
        /* overflow: hidden; */
        width: 100%;
        /* left: 12rem; */
    }

    .cont-btn {
        margin-top: 7rem;
    }

    .link-servicio {
        margin-top: -7rem;
        padding: 0.7rem;
        width: 7.8rem;
    }

    .link-servicio:hover .img-fluid {
        box-shadow: 0 0 2rem rgba(0, 0, 255, 1); /* Ajusta el valor de azul y la opacidad según tus preferencias */
    }

    .carta {
        position: relative;
        overflow: hidden;
        border-radius: 3rem;
        padding-top: 2rem;
        padding-bottom: 1rem;
        padding-right: 0.5rem;
        padding-left: 0.5rem;
        /* margin-right: 0.5rem; */
        /* margin-left: 0.5rem; */
        margin-top: 2rem;
    }

    .carta:hover {
        transform: translateY(-2rem); /* Ajusta la cantidad de elevación según tus preferencias */
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); Agrega una sombra para dar un efecto elevado */
    }

    .card-img-overlay {
        background: rgba(0, 0, 0, 0.5); /* Cambia el color del overlay según tus preferencias */
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0; /* Inicialmente invisible */
        transition: opacity 0.3s ease;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        width: 100%;
        height: auto;
    }

    .carta:hover .card-img-overlay {
        opacity: 1; /* Hacer visible al pasar el cursor sobre la tarjeta */
    }

    .card-orden {
        font-size: 1rem;
        font-weight: 500;
    }

    .card-title {
        color: #000000;
        font-size: 2.2rem;
        font-weight: 700;
        height: 6rem;
        overflow: hidden;
    }

    .card-text {
        line-height: 1.1;
        text-align: justify;
        padding-top: 1rem;
        padding-bottom: 1rem;
        font-size: 1.1rem;
        font-weight: 500;
        color: black;
        height: 15.4rem;
        overflow: hidden;
    }

}

/* xl */
@media (min-width: 1200px) and (max-width: 1400px) {

    .titulo-bolsa, .titulo-bolsa2 {
        font-size: 6rem;
        font-weight: 500;
        line-height: 1.1;
    }

    .titulo-bolsa .mayuscula, .titulo-bolsa2 .mayuscula2 {
        color: #CDE700;
    }

    .titulo-bolsa .minuscula, .titulo-bolsa2 .minuscula2 {
        color: white;
    }

    .texto-bolsa {
        color: #BCBCBC;
        font-size: 1.4rem;
        line-height: 1;
        margin-top: 2rem;
    }

    .imagen-vacantes {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: contain;
        width: 100%;
        height: 56rem;
    }

    .beneficio-titulo {
        font-size: 5rem;
        font-weight: 700;
    }

    .beneficio-col {
        background-color: #201E1F;
        color: #FFFFFF;
        border-top-right-radius: 64px;
        border-bottom-right-radius: 64px;
        padding-left: 8rem;
        padding-top: 2.6rem;
        padding-bottom: 2.6rem;
        font-size: 2rem;
        text-align: left;
        font-weight: 500;
    }

    .beneficio-color {
        border-radius: 100%;
        height: 8.6rem;
        width: 8.6rem;
    }

    .beneficio-icono {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 5rem;
        height: 5rem;
    }

    .formu-grande {
        display: block;
    }

    .formu-small {
        display: none;
    }

    .servicios, .titulo-servicios {
        /* overflow: hidden; */
        width: 100%;
        /* left: 12rem; */
    }

    .cont-btn {
        margin-top: 6rem;
    }

    .link-servicio {
        margin-top: -5rem;
        padding: 0.7rem;
        width: 6.4rem;
    }

    .link-servicio:hover .img-fluid {
        box-shadow: 0 0 2rem rgba(0, 0, 255, 1); /* Ajusta el valor de azul y la opacidad según tus preferencias */
    }

    .carta {
        position: relative;
        overflow: hidden;
        border-radius: 3rem;
        padding-top: 2rem;
        padding-bottom: 1rem;
        padding-right: 0.5rem;
        padding-left: 0.5rem;
        /* margin-right: 0.5rem; */
        /* margin-left: 0.5rem; */
        margin-top: 2rem;
    }

    .carta:hover {
        transform: translateY(-2rem); /* Ajusta la cantidad de elevación según tus preferencias */
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); Agrega una sombra para dar un efecto elevado */
    }

    .card-img-overlay {
        background: rgba(0, 0, 0, 0.5); /* Cambia el color del overlay según tus preferencias */
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0; /* Inicialmente invisible */
        transition: opacity 0.3s ease;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        width: 100%;
        height: auto;
    }

    .carta:hover .card-img-overlay {
        opacity: 1; /* Hacer visible al pasar el cursor sobre la tarjeta */
    }

    .card-orden {
        font-size: 0.8rem;
        font-weight: 500;
    }

    .card-title {
        color: #000000;
        font-size: 1.8rem;
        font-weight: 700;
        height: 5rem;
        overflow: hidden;
    }

    .card-text {
        line-height: 1.1;
        text-align: justify;
        padding-top: 1rem;
        padding-bottom: 1rem;
        font-size: 0.8rem;
        font-weight: 500;
        color: black;
        height: 12rem;
        overflow: hidden;
    }

}

/* lg */
@media (min-width: 992px) and (max-width: 1200px) {

    .titulo-bolsa, .titulo-bolsa2 {
        font-size: 5rem;
        font-weight: 500;
        line-height: 1.1;
    }

    .titulo-bolsa .mayuscula, .titulo-bolsa2 .mayuscula2 {
        color: #CDE700;
    }

    .titulo-bolsa .minuscula, .titulo-bolsa2 .minuscula2 {
        color: white;
    }

    .texto-bolsa {
        color: #BCBCBC;
        font-size: 1.2rem;
        line-height: 1;
        margin-top: 2rem;
    }

    .imagen-vacantes {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: contain;
        width: 100%;
        height: 46rem;
    }

    .beneficio-titulo {
        font-size: 5rem;
        font-weight: 700;
    }

    .beneficio-col {
        background-color: #201E1F;
        color: #FFFFFF;
        border-top-right-radius: 64px;
        border-bottom-right-radius: 64px;
        padding-left: 7rem;
        padding-top: 3rem;
        padding-bottom: 3rem;
        font-size: 1.6rem;
        text-align: left;
        font-weight: 500;
    }

    .beneficio-color {
        border-radius: 100%;
        height: 8.6rem;
        width: 8.6rem;
    }

    .beneficio-icono {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 5rem;
        height: 5rem;
    }

    .formu-grande {
        display: block;
    }

    .formu-small {
        display: none;
    }

    .servicios, .titulo-servicios {
        /* overflow: hidden; */
        width: 100%;
        /* left: 12rem; */
    }

    .cont-btn {
        margin-top: 7rem;
    }

    .link-servicio {
        margin-top: -7rem;
        padding: 0.7rem;
        width: 6.8rem;
    }

    .link-servicio:hover .img-fluid {
        box-shadow: 0 0 2rem rgba(0, 0, 255, 1); /* Ajusta el valor de azul y la opacidad según tus preferencias */
    }

    .carta {
        position: relative;
        overflow: hidden;
        border-radius: 3rem;
        padding-top: 2rem;
        padding-bottom: 1rem;
        padding-right: 0.5rem;
        padding-left: 0.5rem;
        /* margin-right: 0.5rem; */
        /* margin-left: 0.5rem; */
        margin-top: 2rem;
    }

    .carta:hover {
        transform: translateY(-2rem); /* Ajusta la cantidad de elevación según tus preferencias */
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); Agrega una sombra para dar un efecto elevado */
    }

    .card-img-overlay {
        background: rgba(0, 0, 0, 0.5); /* Cambia el color del overlay según tus preferencias */
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0; /* Inicialmente invisible */
        transition: opacity 0.3s ease;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        width: 100%;
        height: auto;
    }

    .carta:hover .card-img-overlay {
        opacity: 1; /* Hacer visible al pasar el cursor sobre la tarjeta */
    }

    .card-orden {
        font-size: 1rem;
        font-weight: 500;
    }

    .card-title {
        color: #000000;
        font-size: 2rem;
        font-weight: 700;
        height: 4rem;
        overflow: hidden;
    }

    .card-text {
        line-height: 1.1;
        text-align: justify;
        padding-top: 1rem;
        padding-bottom: 1rem;
        font-size: 1rem;
        font-weight: 500;
        color: black;
        height: 9.8rem;
        overflow: hidden;
    }

}

/* md */
@media (min-width: 768px) and (max-width: 992px) {

    .titulo-bolsa, .titulo-bolsa2 {
        font-size: 4rem;
        font-weight: 500;
        line-height: 1.1;
    }

    .titulo-bolsa .mayuscula, .titulo-bolsa2 .mayuscula2 {
        color: #CDE700;
    }

    .titulo-bolsa .minuscula, .titulo-bolsa2 .minuscula2 {
        color: white;
    }

    .texto-bolsa {
        color: #BCBCBC;
        font-size: 1.2rem;
        line-height: 1;
        margin-top: 2rem;
    }

    .imagen-vacantes {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: contain;
        width: 100%;
        height: 36rem;
    }

    .beneficio-titulo {
        font-size: 4.4rem;
        font-weight: 700;
    }

    .beneficio-col {
        background-color: #201E1F;
        color: #FFFFFF;
        border-top-right-radius: 64px;
        border-bottom-right-radius: 64px;
        padding-left: 3.6rem;
        padding-top: 2.6rem;
        padding-bottom: 2.6rem;
        font-size: 1.2rem;
        text-align: left;
        font-weight: 500;
    }

    .beneficio-color {
        border-radius: 100%;
        height: 7rem;
        width: 7rem;
    }

    .beneficio-icono {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 4rem;
        height: 4rem;
    }

    .formu-grande {
        display: none;
    }

    .formu-small {
        display: block;
    }

    .servicios, .titulo-servicios {
        /* overflow: hidden; */
        width: 100%;
        /* left: 12rem; */
    }

    .cont-btn {
        margin-top: 6rem;
    }

    .link-servicio {
        margin-top: -3rem;
        padding: 0.7rem;
        width: 5.8rem;
    }

    .link-servicio:hover .img-fluid {
        box-shadow: 0 0 2rem rgba(0, 0, 255, 1); /* Ajusta el valor de azul y la opacidad según tus preferencias */
    }

    .carta {
        position: relative;
        overflow: hidden;
        border-radius: 3rem;
        padding-top: 2rem;
        padding-bottom: 0rem;
        padding-right: 0.5rem;
        padding-left: 0.5rem;
        margin-right: 0.5rem;
        margin-left: 0.5rem;
        margin-top: 2rem;
    }

    .carta:hover {
        transform: translateY(-2rem); /* Ajusta la cantidad de elevación según tus preferencias */
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); Agrega una sombra para dar un efecto elevado */
    }

    .card-img-overlay {
        background: rgba(0, 0, 0, 0.5); /* Cambia el color del overlay según tus preferencias */
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0; /* Inicialmente invisible */
        transition: opacity 0.3s ease;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        width: 100%;
        height: auto;
    }

    .carta:hover .card-img-overlay {
        opacity: 1; /* Hacer visible al pasar el cursor sobre la tarjeta */
    }

    .card-orden {
        font-size: 0.8rem;
        font-weight: 500;
    }

    .card-title {
        color: #000000;
        font-size: 1.6rem;
        font-weight: 700;
        height: 4rem;
        overflow: hidden;
    }

    .card-text {
        line-height: 1.1;
        text-align: justify;
        padding-top: 1rem;
        padding-bottom: 1rem;
        font-size: 0.8rem;
        font-weight: 500;
        color: black;
        height: 9.8rem;
        overflow: hidden;
    }

}

/* sm */
@media (min-width: 576px) and (max-width: 768px) {

    .titulo-bolsa, .titulo-bolsa2 {
        font-size: 3rem;
        font-weight: 500;
        line-height: 1.1;
    }

    .titulo-bolsa .mayuscula, .titulo-bolsa2 .mayuscula2 {
        color: #CDE700;
    }

    .titulo-bolsa .minuscula, .titulo-bolsa2 .minuscula2 {
        color: white;
    }

    .texto-bolsa {
        color: #BCBCBC;
        font-size: 1rem;
        line-height: 1;
        margin-top: 2rem;
    }

    .imagen-vacantes {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: contain;
        width: 100%;
        height: 26rem;
    }

    .beneficio-titulo {
        font-size: 3.4rem;
        font-weight: 700;
    }

    .beneficio-col {
        background-color: #201E1F;
        color: #FFFFFF;
        border-top-right-radius: 64px;
        border-bottom-right-radius: 64px;
        padding-left: 1.2rem;
        padding-top: 1.8rem;
        padding-bottom: 1.8rem;
        font-size: 0.8rem;
        text-align: left;
        font-weight: 500;
    }

    .beneficio-color {
        border-radius: 100%;
        height: 5rem;
        width: 5rem;
    }

    .beneficio-icono {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 3rem;
        height: 3rem;
    }

    .formu-grande {
        display: none;
    }

    .formu-small {
        display: block;
    }

    .servicios, .titulo-servicios {
        /* overflow: hidden; */
        width: 100%;
        /* left: 12rem; */
    }

    .cont-btn {
        margin-top: 8rem;
    }

    .link-servicio {
        margin-top: -7rem;
        padding: 0.7rem;
        width: 7.8rem;
    }

    .link-servicio:hover .img-fluid {
        box-shadow: 0 0 2rem rgba(0, 0, 255, 1); /* Ajusta el valor de azul y la opacidad según tus preferencias */
    }

    .carta {
        position: relative;
        overflow: hidden;
        border-radius: 3rem;
        padding-top: 2rem;
        padding-bottom: 0rem;
        padding-right: 2rem;
        padding-left: 2rem;
        margin-right: 0.5rem;
        margin-left: 0.5rem;
        margin-top: 2rem;
    }

    .carta:hover {
        transform: translateY(-2rem); /* Ajusta la cantidad de elevación según tus preferencias */
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); Agrega una sombra para dar un efecto elevado */
    }

    .card-img-overlay {
        background: rgba(0, 0, 0, 0.5); /* Cambia el color del overlay según tus preferencias */
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0; /* Inicialmente invisible */
        transition: opacity 0.3s ease;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        width: 100%;
        height: auto;
    }

    .carta:hover .card-img-overlay {
        opacity: 1; /* Hacer visible al pasar el cursor sobre la tarjeta */
    }

    .card-orden {
        font-size: 1.6rem;
        font-weight: 500;
    }

    .card-title {
        color: #000000;
        font-size: 3rem;
        font-weight: 700;
        height: 8rem;
        overflow: hidden;
    }

    .card-text {
        line-height: 1.1;
        text-align: justify;
        padding-top: 1rem;
        padding-bottom: 1rem;
        font-size: 1.3rem;
        font-weight: 500;
        color: black;
        height: 16.8rem;
        overflow: hidden;
    }

}

/* xs */
@media (min-width: 0px) and (max-width: 576px) {

    .titulo-bolsa, .titulo-bolsa2 {
        font-size: 2.2rem;
        font-weight: 500;
        line-height: 1.1;
    }

    .titulo-bolsa .mayuscula, .titulo-bolsa2 .mayuscula2 {
        color: #CDE700;
    }

    .titulo-bolsa .minuscula, .titulo-bolsa2 .minuscula2 {
        color: white;
    }

    .texto-bolsa {
        color: #BCBCBC;
        font-size: 0.8rem;
        line-height: 1;
        margin-top: 2rem;
    }

    .imagen-vacantes {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: contain;
        width: 100%;
        height: 20rem;
    }

    .beneficio-titulo {
        font-size: 2.4rem;
        font-weight: 700;
    }

    .beneficio-col {
        background-color: #201E1F;
        color: #FFFFFF;
        border-top-right-radius: 64px;
        border-bottom-right-radius: 64px;
        padding-left: 1rem;
        padding-top: 1rem;
        padding-bottom: 1rem;
        font-size: 0.6rem;
        text-align: left;
        font-weight: 500;
    }

    .beneficio-color {
        border-radius: 100%;
        height: 3rem;
        width: 3rem;
    }

    .beneficio-icono {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 1.5rem;
        height: 1.5rem;
    }

    .formu-grande {
        display: none;
    }

    .formu-small {
        display: block;
    }

    .servicios, .titulo-servicios {
        /* overflow: hidden; */
        width: 100%;
        /* left: 12rem; */
    }

    .cont-btn {
        margin-top: 6rem;
    }

    .link-servicio {
        margin-top: -7rem;
        padding: 0.7rem;
        width: 6.8rem;
    }

    .link-servicio:hover .img-fluid {
        box-shadow: 0 0 2rem rgba(0, 0, 255, 1); /* Ajusta el valor de azul y la opacidad según tus preferencias */
    }

    .carta {
        position: relative;
        overflow: hidden;
        border-radius: 3rem;
        padding-top: 2rem;
        padding-bottom: 0rem;
        padding-right: 0.5rem;
        padding-left: 0.5rem;
        margin-right: 0.5rem;
        margin-left: 0.5rem;
        margin-top: 2rem;
    }

    .carta:hover {
        transform: translateY(-2rem); /* Ajusta la cantidad de elevación según tus preferencias */
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); Agrega una sombra para dar un efecto elevado */
    }

    .card-img-overlay {
        background: rgba(0, 0, 0, 0.5); /* Cambia el color del overlay según tus preferencias */
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0; /* Inicialmente invisible */
        transition: opacity 0.3s ease;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        width: 100%;
        height: auto;
    }

    .carta:hover .card-img-overlay {
        opacity: 1; /* Hacer visible al pasar el cursor sobre la tarjeta */
    }

    .card-orden {
        font-size: 1rem;
        font-weight: 500;
    }

    .card-title {
        color: #000000;
        font-size: 2.4rem;
        font-weight: 700;
        height: 6rem;
        overflow: hidden;
    }

    .card-text {
        line-height: 1.1;
        text-align: justify;
        padding-top: 1rem;
        padding-bottom: 1rem;
        font-size: 1rem;
        font-weight: 500;
        color: black;
        height: 16.5rem;
        overflow: hidden;
    }

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


        <div class="row px-0 py-5" data-aos="zoom-in-left">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-11 mx-auto display-3 text-white mt-5 mb-3 py-3" style="font-family: 'Sansation Bold', sans-serif;">
                        Nuestras vacantes
                    </div>
                </div>
                <div class="row">
                    <div class="servicios px-0">
                        @foreach ($vacantes as $vac)
                        <div class="col-3">
                            <div class="card px-0 position-relative carta border-0 rounded-0">
                                <div class="card border-0 rounded-0 position-absolute start-0 top-0 bottom-0" style="
                                    background-color: #201E1F;
                                    background-image: url('{{ asset('img/photos/vacantes/'.$vac->portada) }}');
                                    background-size: cover;
                                    background-position: center center;
                                    background-repeat: no-repeat;
                                    width: 100%;
                                    filter: grayscale(100%);
                                "></div>
                                <div class="card-img-overlay rounded-0 py-5 " style="height: auto; filter: grayscale(100%);">
                                    <div class="card rounded-0 border-0 bg-transparent position-absolute start-0 top-50 text-white" style="margin-top: -10rem;">
                                        <div class="row">
                                            <div class="col-9 mx-auto" style="font-family: 'Sansation Bold', sans-serif; text-align: justify; height: 40rem;">
                                                {{ $vac->descripcion }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border-0">
                                    {{-- <h3 class="card-title text-white p-0 m-0" style="font-family: 'Sansation Bold', sans-serif;">{{ $vac->titulo }}</h3> --}}
                                </div>
                                <div class="card col-12 bg-transparent border-0 position-absolute top-0 start-0 mt-5">
                                    <div class="row">
                                        <div class="col-9 mx-auto">
                                            <h3 class="card-title text-white p-0 m-0" style="font-family: 'Sansation Bold', sans-serif;">{{ $vac->titulo }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative cont-btn">
                                    <div class="card bg-transparent border-0 ms-5 position-absolute bottom-0 start-0 translate-middle-y">
                                        <div class="row">
                                            <div class="col-xxl-4 link-servicio">
                                                <a href="{{ route('front.contact') }}" class="text-center  rounded-circle">
                                                    <img src="{{ asset('img/images/3my-imagetct3.png') }}" alt="right-up" class="img-fluid btn-serv rounded-circle" style="filter: grayscale(0%);">
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
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"></div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 mx-xxl-auto mx-xl-auto mx-lg-auto mx-md-auto mx-sm-auto mx-auto position-relative text-center slider-dots-container-pri">
                        <button class="slick-prev-pri btn position-absolute start-0" style="overflow: hidden"><img src="{{ asset('img/design/chevron-left.png') }}" alt="" class="img-fluid"></button>
                        <div class="slider-dots"></div>
                        <button class="slick-next-pri btn position-absolute end-0" style="overflow: hidden"><img src="{{ asset('img/design/chrevron-right.png') }}" alt="" class="img-fluid"></button>
                    </div>
                </div>
                {{-- <div class="row" style="overflow: hidden;">
                    <div class="servicios">
                        @foreach ($vacantes as $vac)
                        <div class="col-3">
                            <div class="card position-relative carta border-0" style="background-color: {{ $vac->color }};">
                                <div class="card-img-overlay" <!--style="background-image: url('{{ asset('img/photos/vacantes/'.$vac->portada) }}');"//-->>
                                </div>
                                <div class="card-body">
                                    <!-- <small class="card-orden">{{ $vac->orden }}</small> //-->
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
                </div> --}}
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
                <div class="beneficio-color position-relative" style="background-color: #FFC000;">
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
