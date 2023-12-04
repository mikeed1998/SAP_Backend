@extends('layouts.admin')
@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@endsection
@section('jsLibExtras')

@endsection
@section('styleExtras')
<style>

@font-face {
        font-family: 'Neusharp Bold';
        font-style: normal;
        font-weight: normal;
        src: local('Neusharp Bold'), url({{ asset('fonts/Neusharp-Bold/NeusharpBold-7B8RV.woff') }}) format('woff');
    }
	/* mas estilisado */	
		body{
			background-color: #e5e8eb  !important;
		}
		.card-header {
			background-color: #b0c1d1  !important;
		}
		.black-skin .btn-primary {

		}
		.btn {
			box-shadow: none;
			border-radius: 15px;
		}
	/* mas estilisado */


    .seccionnoed0{
		opacity: 0%;
		transition: all 0.5s;
	}

	.seccionnoed0:hover{
		opacity: 100%;
		transition: all 0.5s;
	}

    .seccionnoed0:hover .letra{
		opacity: 100%;
		transition: all 0.5s;
	}



    textarea:focus-visible{
        border-radius: 16px;
        border: 1px solid rgba(0, 0, 0, 0.167) !important;
    }

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
                    opacity: 0%;
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
<style>

	.card{
		
	}

	@media only screen and (max-width: 768px){  
		.cont_circle{
			bottom: -150px !important;
		}
		.circle_slider{
			width: 300px !important; 
			height: 300px !important;
		}
		.img_circle{
			margin-top: -120px !important;
		}
	}  
	@media only screen and (max-width: 390px){  
		.cont_circle{
			bottom: -100px !important;
		}
		.circle_slider{
			width: 200px !important; 
			height: 200px !important;
		}
		.img_circle{
			margin-top: -80px !important;
		}
		.img_product{
			margin-left: 0px !important;
		}
	}

</style>
<style>
    .container::-webkit-scrollbar {
        width: 8px;     /* Tamaño del scroll en vertical */
        height: 8px;    /* Tamaño del scroll en horizontal */
        display: none;  /* Ocultar scroll */
    }

    .container::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 4px;
    }

    /* Cambiamos el fondo y agregamos una sombra cuando esté en hover */
    .container::-webkit-scrollbar-thumb:hover {
        background: #b3b3b3;
        box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
    }

    /* Cambiamos el fondo cuando esté en active */
    .container::-webkit-scrollbar-thumb:active {
        background-color: #999999;
    }

    .container::-webkit-scrollbar-track {
        background: #e1e1e1;
        border-radius: 4px;
    }

    /* Cambiamos el fondo cuando esté en active o hover */
    .container::-webkit-scrollbar-track:hover,
    .container::-webkit-scrollbar-track:active {
    background: #d4d4d4;
    }
</style>
@endsection
@section('content')
        <div class="row mb-4 px-2">
            <a href="{{ route('config.seccion.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
        </div>

       
        <div class="col-12 my-5 text-center d-flex justify-content-center align-items-center flex-column">
            <p class="mt-5" style="font-size: 4.5rem; font-family:'Neusharp Bold'; color: #909986;">VACANTES</p>
			<div class="col-6">
				{{-- <div class="col-12 mb-2 text-center"><i class="fa-solid fa-pencil" style="font-size: 1.5rem;"></i></div>
				<textarea class="col-12 text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[0]->id}}" data-table="elemento" data-campo="texto" name="" id="" cols="30" rows="3" style="border-radius: 10px; border:none; background: #ededed">{{$elements[0]->texto}}</textarea> --}}
			</div>
        </div>

    <div class="col-12">

        <div class="col-12 text-center d-flex justify-content-center flex-column">
            <h4 style="font-family:'Neusharp Bold';">Agregar Vacante</h4>
            <div >
                <button style="background: none !important; border:none;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-circle-plus" style="font-size: 2rem;"></i></button>
            </div>
        </div>

        <div class="container d-flex flex-wrap">
            @foreach($vacantes as $v)
            <div class="col-4 p-3 " style="border-radius:26px;">
                <div class="card position-relative">
                    <img src="{{asset('img/photos/vacantes/'.$v->portada)}}" alt="" class="img-fluid">
                    <div class="card w-100 position-absolute top-50 start-50 translate-middle bg-transparent border-0">
                        <form id="form_aux-{{ $v->id }}" action="image_input_ejemplo" method="POST" class="file-upload px-auto col-7" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_elemento" value="{{ $v->id }}">
                            <input type="hidden" name="tipo" value="vacante">
                            <input id="img_aux-{{ $v->id }}" class="m-0 p-0" type="file" name="archivo">
                            <label class="col-12 m-0 px-2 d-flex justify-content-center align-items-center" for="img_aux-{{ $v->id }}" style=" height: 100%; opacity: 100%; border-radius: 20px;">Actualizar Imagen</label>
                        </form>
                        <script>
                            $('#img_aux-{{ $v->id }}').change(function(e) {
                                $('#form_aux-{{ $v->id }}').trigger('submit');
                            });
                        </script>
                    </div>
                </div>
                <div class="col-12 mt-3 d-flex flex-column" style="text-align: justify;">
                    
                    <h5><input type="text" class="form-control editar_text_seccion_global" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$v->id}}" data-table="ZVacante" data-campo="titulo" value="{{$v->titulo}}"></h5>
                    {{-- <hr class="my-2"> --}}
					<textarea class="col-12 mx-0 scrollux editar_text_seccion_global" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$v->id}}" data-table="ZVacante" data-campo="descripcion"  cols="30" rows="5" style="background: #f2f2f2; border:none; border-radius: 10px;">{{$v->descripcion}}</textarea>
                    <form action="{{route('config.seccion.elimProy')}}" method="POST" class="col-12 text-center">
                        @csrf
                        <input type="text" name="id_proy" value="{{$v->id}}" hidden>
                        <style>
                            .fa-trash:hover{
                                opacity: 50%;
                            }
                        </style>
                        <button class="col-12" style="background: none; border:none;">
                            <i  class="fa-solid fa-trash my-3" style="font-size: 20px;"></i>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- <div class="col-12 my-5 d-flex justify-content-center align-items-center flex-column text-center">
        <img src="{{asset('img/design/footerp.png')}}" alt="">
        <a href="" class="mt-2" style="color: #909986; font-size: 1.2rem;">VISITAR</a>
        <div class="col-auto d-flex justify-content-center align-items-center flex-row">
            
        </div>
    </div> --}}

{{-- modal agregar vacante --}}
<form action="{{route('config.seccion.agproyect')}}" method="POST" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" enctype="multipart/form-data">
    <div class="modal-dialog modal-dialog-centered">
    <div  class="modal-content" style="border-radius: 16px;" >
        @csrf
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar vacante</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <style>
                .backr{
                    background: #1555bc !important;
                }
            </style>
            <div class="col-12 mb-2" style="height: 100px; position: relative;">
                    <div  class="file-upload col-12 p-0 m-0" style=" top: 0; bottom: 0; background: ; height: 100%;" >
                        @csrf
                        <input id="input_img_element" class="m-0 p-0" type="file" name="archivo">
                        <label id="label_form" class="col-12 m-0 p-0 d-flex justify-content-center align-items-center" for="input_img_element" style="opacity: 100%; height: 100%;  border-radius: 16px;">Seleccionar archivo</label>
                    </div>
                    <script>
                        ///////////////////// Editar campos imegn categoria ////////////////////
                        $('#input_img_element').change(function(e) {
                            $('#label_form').addClass('backr');
                            $('#label_form').html('Imagen añadida');
                        });
                        ///////////////////// Editar campos imegn categoria ////////////////////
                    </script>
            </div>
            <div class="col-12 mb-2">
                <label for="colorPicker" class="form-label">Selecciona un color de fondo:</label>
                <input type="color" class="form-control" id="colorPicker" name="colorPicker" value="#CCAEEC" onchange="actualizarColor()">
            </div>
            <div class="col-12 mb-2">
                <input type="number" name="orden" class="form-control" placeholder="Orden">
            </div>
            <div class="col-12 mb-2">
                <input class="form-control" type="text" name="titulov" placeholder="Nombre de la vacante">
            </div>
            <div class="col-12">
                <textarea class="col-12 form-control" name="descripcionv" id="" rows="5" placeholder="Descripción de la vacante"></textarea>
            </div>
        </div>
        <div class="modal-footer">
        <div class="btn btn-secondary" data-bs-dismiss="modal" style="background: red !important; border:none;">Cerrar</div>
        <button type="submit" class="btn btn-primary" style="background: #1555bc !important; border:none;">Agregar</button>
        </div>
    </div>
    </div>
</form>
{{-- modal agregar vacante --}}
@endsection
@section('jsLibExtras2')
<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection
@section('jqueryExtra')
<script type="text/javascript">

$('#input_img_element').change(function(e) {
		// var campo = $(this).attr("data-campo");
		var valor = ($(this).val());

		console.log(valor);
		$('#form_image_element').trigger('submit');

	});
    $('#input_img_element2').change(function(e) {
		// var campo = $(this).attr("data-campo");
		var valor = ($(this).val());

		console.log(valor);
		$('#form_image_element2').trigger('submit');

	});
    $('#input_img_element3').change(function(e) {
		// var campo = $(this).attr("data-campo");
		var valor = ($(this).val());

		console.log(valor);
		$('#form_image_element3').trigger('submit');

	});

	$(document).ready(function() {
		$('.dropify').dropify();

		$('.fa-trash-alt').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#ipdel").val(id);
				console.log(id);
			});

///////////////////// Editar campos ////////////////////
		$('.input-txt-nos').change(function(e) {

            var id = $(this).attr("data-id");
            var campo = $(this).attr("data-campo");
            var valor = ($(this).val());
            var tcsrf = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: 'textnosotrosup',
                type: 'post',
                dataType: 'json',
                data: {
                    "id": id,
                    "campo": campo,
                    "valor": valor,
                    "_token": tcsrf,
                }
            })
            .done(function(msg) {
                if (msg.success) {
                    toastr["success"]("Guardado Exitosamente");
                }else {
                    toastr["error"]("Error al actualizar");
                    setTimeout(function () { location.reload(); }, 1000);
                }
            })

            });
///////////////////// Editar campos ////////////////////

    $('.input-image-equipo').change(function(e) {
        var id = $(this).attr("data-id");
        console.log(id);
        $('#formEquipo'+id).trigger('submit');
    });

    $('.input_logo').change(function(e) {
        $('#form_logo_alianza').trigger('submit');
    });


	});
</script>
<script>
    function actualizarColor() {
   // Obtener el valor hexadecimal del color seleccionado
   var colorSeleccionado = document.getElementById('colorPicker').value;

   // Actualizar el contenido del span con el valor seleccionado
   document.getElementById('colorSeleccionado').innerText = colorSeleccionado;
 }
</script>
@endsection
