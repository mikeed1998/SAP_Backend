@extends('layouts.front')

@section('title', 'Contacto')

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

    .form-control::placeholder {
        color: var(--azul-titulos);
        font-weight: 400;

    }

    @media(min-width: 1800px) {
        .top-form {
            margin-top: 3rem;
            background-color: var(--azul-titulos); 
            border-top-left-radius: 6rem; 
            border-bottom-left-radius: 6rem;
        }

        .redondeo-form {
            border-radius: 1rem;
            padding: 0.7rem;
        }

        .fondo-contacto {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 54rem;
        }

        .info-col {
            border-left: 2px solid red;
            color: var(--azul-titulos);
        }

        .mapa {
            width: 100%;
            height: 44rem;
        }
    }

    /* xxl */
    @media (min-width: 1400px) and (max-width: 1799px) {
        .top-form {
            margin-top: 3rem;
            background-color: var(--azul-titulos); 
            border-top-left-radius: 6rem; 
            border-bottom-left-radius: 6rem;
        }

        .redondeo-form {
            border-radius: 1rem;
            padding: 0.7rem;
        }

        .fondo-contacto {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 54rem;
        }

        .info-col {
            border-left: 2px solid red;
            color: var(--azul-titulos);
        }

        .mapa {
            width: 100%;
            height: 38rem;
        }
    }

    /* xl */
    @media (min-width: 1200px) and (max-width: 1400px) {
        .top-form {
            margin-top: 3rem;
            background-color: var(--azul-titulos); 
            border-top-left-radius: 6rem; 
            border-bottom-left-radius: 6rem;
        }

        .redondeo-form {
            border-radius: 1rem;
            padding: 0.7rem;
        }

        .fondo-contacto {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 54rem;
        }

        .info-col {
            border-left: 2px solid red;
            color: var(--azul-titulos);
        }

        .mapa {
            width: 100%;
            height: 38rem;
        }
    }

    /* lg */
    @media (min-width: 992px) and (max-width: 1200px) {
        .top-form {
            margin-top: 3rem;
            background-color: var(--azul-titulos); 
            border-top-left-radius: 6rem; 
            border-bottom-left-radius: 6rem;
        }

        .redondeo-form {
            border-radius: 1rem;
            padding: 0.7rem;
        }

        .fondo-contacto {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 54rem;
        }

        .info-col {
            border-left: 2px solid red;
            color: var(--azul-titulos);
        }

        .mapa {
            width: 100%;
            height: 38rem;
        }
    }

    /* md */
    @media (min-width: 768px) and (max-width: 992px) {
        .top-form {
            margin-top: 3rem;
            background-color: var(--azul-titulos); 
            border-top-left-radius: 6rem; 
            border-bottom-left-radius: 6rem;
        }

        .redondeo-form {
            border-radius: 1rem;
            padding: 0.7rem;
        }

        .fondo-contacto {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 54rem;
        }

        .info-col {
            border-left: 2px solid red;
            border-right: 2px solid red;
            color: var(--azul-titulos);
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .mapa {
            width: 100%;
            height: 38rem;
        }
    }

    /* sm */
    @media (min-width: 576px) and (max-width: 768px) {
        .top-form {
            margin-top: 3rem;
            background-color: var(--azul-titulos); 
            border-top-left-radius: 0rem; 
            border-bottom-left-radius: 0rem;
        }

        .redondeo-form {
            border-radius: 1rem;
            padding: 0.7rem;
        }

        .fondo-contacto {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 54rem;
        }

        .info-col {
            border-left: 2px solid red;
            border-right: 2px solid red;
            color: var(--azul-titulos);
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .mapa {
            width: 100%;
            height: 38rem;
        }
    }

    /* xs */
    @media (min-width: 0px) and (max-width: 576px) {
        .top-form {
            margin-top: 3rem;
            background-color: var(--azul-titulos); 
            border-top-left-radius: 0rem; 
            border-bottom-left-radius: 0rem;
        }

        .redondeo-form {
            border-radius: 1rem;
            padding: 0.7rem;
        }

        .fondo-contacto {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 54rem;
        }

        .info-col {
            border-left: 2px solid red;
            border-right: 2px solid red;
            color: var(--azul-titulos);
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .mapa {
            width: 100%;
            height: 38rem;
        }
    }

</style>

<div class="container-fluid">
    <div class="row">
        <div class="col position-relative fondo-contacto" style="
            background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[7]->imagen) }}');
        ">
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-9 col-sm-12 col-xs-12 col-12 top-form position-absolute top-0 bottom-0 end-0">
                <form action="{{ route('formularioContac') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tipoForm" value="contacto">
                    <div class="row">
                        <div class="col-10 py-5 mx-auto">
                            <div class="row m-3">
                                <div class="col px-0 text-start display-4 text-white fw-bolder" style="font-family:'Neusharp Bold';">
                                    CONTACTO
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12 col-12 mx-xxl-0 mx-xl-0 mx-lg-0 mx-md-0 mx-sm-auto mx-xs-auto mx-auto py-1 ps-4 text-start text-light" style="line-height: 1;">
                                    {{ $elements[0]->texto }}
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col py-2">
                                    <input type="text" name="nombre" class="form-control redondeo-form" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-2">
                                    <input type="text" name="empresa" class="form-control redondeo-form" placeholder="Empresa" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-2">
                                    <input type="email" name="correo" class="form-control redondeo-form" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-2">
                                    <input type="number" name="whatsapp" class="form-control redondeo-form" placeholder="Whatsapp" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-2">
                                    <input type="text" name="asunto" class="form-control redondeo-form" placeholder="Asunto" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-2">
                                    <textarea name="mensaje" id="" cols="30" rows="4" class="form-control redondeo-form" placeholder="Mensaje" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12 py-2">
                                    <input type="submit" class="btn btn-outline py-3 fs-4 w-100 border border-white rounded-pill text-white" value="Enviar Mensaje">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col py-3" style="background-color: var(--fondo);">
            <div class="row">
                <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-11 col-sm-11 col-xs-11 col-11 mx-auto">
                    <div class="row">
                        <div class="col-xxl-2 col-xl-2 col-lg-1"></div>
                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-12 col-sm-12 col-xs-12 col-12 ps-3 py-3 info-col">
                            {{ $config->destinatario }}
                            <br>
                            {{ $config->destinatario2 }}
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 col-12 info-col">
                            {{ $config->direccion }}
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 col-12 py-3 info-col">
                            Tel. {{ $config->telefono }}
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-11 col-sm-11 col-xs-11 col-11 mx-auto py-xxl-1 py-xl-1 py-lg-1 py-md-3 py-sm-3 py-xs-3 py-3">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-1 col-sm-1 col-xs-2 col-2 px-0">
                                    <a href="https://wa.me/{{ $config->whatsapp }}">
                                        <img src="{{ asset('img/design/footer/wp.png') }}" alt="" class="img-fluid w-75">
                                    </a>
                                </div>
                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-1 col-sm-1 col-xs-2 col-2 px-0">
                                    <a href="{{ $config->facebook }}">
                                        <img src="{{ asset('img/design/footer/fb.png') }}" alt="" class="img-fluid w-75">
                                    </a>
                                </div>
                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-1 col-sm-1 col-xs-2 col-2 px-0">
                                    <a href="{{ $config->instagram }}">
                                        <img src="{{ asset('img/design/footer/ins.png') }}" alt="" class="img-fluid w-75">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col px-0">
            <iframe src="{{ $elements[8]->texto }}" class="mapa" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>


@endsection

@section('jqueryExtra')
<script>
    
</script>
@endsection
