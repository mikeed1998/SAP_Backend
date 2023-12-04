@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@endsection

@section('jsLibExtras')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('styleExtras')

@endsection

@section('content')
<style>

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

    <div class="container-fluid">
        <div class="row">
            <div class="col text-center fs-1">
                HOME
            </div>
        </div>
        <div class="row">
            <div class="col text-center fs-1 border py-5">
                Diseño sin confirmar
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center flex-column mt-2 text-center">
                <h3 class="fs-1 fw-bolder" style="color:black; font-family: Arial, sans-serif;">Agregar slider</h3>
                <form id="form_image_slider" action="imgSider" method="POST"  class="file-upload mt-2" style="" enctype="multipart/form-data">
                    @csrf
                    <input id="input_slider_img" class="m-0 p-0" type="file" name="archivo">
                    <label class="col-12 m-0 p-2 d-flex justify-content-center align-items-center" for="input_slider_img" style="opacity: 100%; !important; border-radius: 26px; background-color: #44B2E3;">Seleccionar archivo</label>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="carrusel-principal border">
                @foreach ($slider_principal as $sp)
                    <div class="col position-relative slider-principal py-5" style="
                        background-image: url('{{ asset('img/photos/slider_principal/'.$sp->slider) }}'); 
                    ">
                        <div class="col-1 py-3 position-absolute top-0 end-0">
                            <form action="{{ route('config.seccion.delSide', [$sp->id]) }}" method="POST" style="display: inline;">						
                                @csrf
                                @method('DELETE') 
                                <button type="submit" class="btn btn-danger btn-block bg-danger rounded-pill"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row py-5">
            <div class="col position-relative text-center fs-1 border py-5">
                SERVICIOS
                <div class="col-12 d-flex align-content-center justify-content-center position-absolute top-0 bottom-0 start-0 cuadro">
                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center fs-1 border py-5">
                Diseño sin confirmar
            </div>
        </div>
        <div class="row">
            <div class="col text-center fs-1 border py-5">
                Diseño sin confirmar
            </div>
        </div>
        <div class="row py-5">
            <div class="col-12 d-flex justify-content-center align-items-center flex-column mt-2 text-center">
                <h3 class="fs-1 fw-bolder" style="color:black; font-family: Arial, sans-serif;">Agregar Cliente</h3>
                <form id="form_image_slider2" action="{{ route('config.seccion.imgSiderCliente') }}" method="POST"  class="file-upload mt-2" style="" enctype="multipart/form-data">
                    @csrf
                    <input id="input_slider_img2" class="m-0 p-0" type="file" name="archivo">
                    <label class="col-12 m-0 p-2 d-flex justify-content-center align-items-center" for="input_slider_img2" style="opacity: 100%; !important; border-radius: 26px; background-color: #44B234;">Seleccionar archivo</label>
                </form>
            </div>
        </div>
        <div class="row">
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
        <div class="row">
            <div class="col text-center fs-1 border py-5">
                Diseño sin confirmar
            </div>
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
        $('.carrusel-principal').slick({
        dots: true,
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
@endsection