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
<style>
    
@media(min-width: 1800px) {

    .portada-admin {
        height: 24rem;
    }
     
}

/* xxl */
@media (min-width: 1400px) and (max-width: 1799px) {
    
    .portada-admin {
        height: 24rem;
    }

}

/* xl */
@media (min-width: 1200px) and (max-width: 1400px) {

    .portada-admin {
        height: 24rem;
    }

}

/* lg */
@media (min-width: 992px) and (max-width: 1200px) {

    .portada-admin {
        height: 24rem;
    }

}

/* md */
@media (min-width: 768px) and (max-width: 992px) {



}

/* sm */
@media (min-width: 576px) and (max-width: 768px) {

    

}

/* xs */
@media (min-width: 0px) and (max-width: 576px) {

    

}

</style>
@endsection
@section('content')
        <div class="row mb-4 px-2">
            <a href="{{ route('config.seccion.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
        </div>

       
        <div class="col-12 my-5 text-center d-flex justify-content-center align-items-center flex-column">
            <p class="mt-5" style="font-size: 4.5rem; font-family:'Neusharp Bold'; color: white;">VACANTES</p>
			<div class="col-6">
				{{-- <div class="col-12 mb-2 text-center"><i class="fa-solid fa-pencil" style="font-size: 1.5rem;"></i></div>
				<textarea class="col-12 text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[0]->id}}" data-table="elemento" data-campo="texto" name="" id="" cols="30" rows="3" style="border-radius: 10px; border:none; background: #ededed">{{$elements[0]->texto}}</textarea> --}}
			</div>
        </div>

    <div class="col-12">

        <div class="col-12 text-center d-flex justify-content-center flex-column">
            <h4 style="font-family:'Neusharp Bold'; color: white;">Agregar Vacante</h4>
            <div >
                <button style="background: none !important; border:none;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-circle-plus" style="font-size: 2rem; color: white;"></i></button>
            </div>
        </div>

        <div class="container d-flex flex-wrap">
            @foreach($vacantes as $v)
            <div class="col-4 p-3 " style="border-radius:26px;">
                <div class="card position-relative">
                    <img src="{{asset('img/photos/vacantes/'.$v->portada)}}" alt="" class="img-fluid portada-admin">
                    <div class="card w-100 position-absolute top-0 start-0 bg-transparent border-0">
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
                    <div class="col-3 position-absolute top-0 end-0">
                        <div class="row">
                            <div class="col text-center p-3">
                                <input type="number" class="form-control fw-bold editar_text_seccion_global" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$v->id}}" data-table="ZVacante" data-campo="orden" value="{{$v->orden}}" style="box-shadow: 0;" placeholder="Orden">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3 d-flex flex-column" style="text-align: justify;">
                    <div class="col-12 mt-2">
                        <input type="color" class="form-control py-2 editar_text_seccion_global" value="{{ $v->color }}" onchange="actualizarColor()"  data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$v->id}}" data-table="ZVacante" data-campo="color">
                    </div>
                    <div class="col-12 position-relative mt-2">
                        <h5><input type="text" class="form-control mt-2 editar_text_seccion_global" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$v->id}}" data-table="ZVacante" data-campo="titulo" value="{{$v->titulo}}"></h5>
                        <div class="col-1 position-absolute top-0 start-100">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                        </div>
                    </div>
                    <div class="col-12 position-relative mt-2">
					    <textarea class="col-12 mx-0 scrollux editar_text_seccion_global" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$v->id}}" data-table="ZVacante" data-campo="descripcion"  cols="30" rows="10" style="background: #f2f2f2; border:none; border-radius: 10px;">{{$v->descripcion}}</textarea>
                        <div class="col-1 position-absolute top-0 start-100">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                        </div>
                    </div>
                    {{-- <hr class="my-2"> --}}
                    <form action="{{route('config.seccion.elimVacante', ['vacante' => $v->id])}}" method="POST" id="form-{{ $v->id }}" class="col-12 text-center">
                        @csrf
                        @method('DELETE')
                        {{-- <input type="text" name="id_proy" value="{{$v->id}}" hidden> --}}
                        <style>
                            .fa-trash:hover{
                                opacity: 50%;
                            }
                        </style>
                        <button type="submit" class="col-12" style="background: none; border:none;">
                            <i  class="fa-solid fa-trash my-3" style="font-size: 40px; color: red;"></i>
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
<form action="{{route('config.seccion.agVacante')}}" method="POST" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" enctype="multipart/form-data">
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
