@extends('layouts.admin')

@section('cssExtras')

@endsection

@section('jsLibExtras')

@endsection

@section('styleExtras')
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
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.seccion.show', ['slug' => 'sucursals']) }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

    <div class="container-fluid">
        <div class="row">
            <div class="col fs-1 text-white text-center">
                Galeria de imagenes de la sucursal: {{ $sucursal->sucursal }}
                {{-- @foreach ($estados as $est)
                    @if ($est->id == $sucursal->estado)
                        {{ $est->nombre }}
                    @endif
                @endforeach  --}}
            </div>
        </div>
        <div class="row">
            <div class="col-6 mx-auto">
                <form id="form_image_slider" action="{{ route('config.seccion.imgSiderGaleria') }}" method="POST"  class="file-upload mt-2" style="" enctype="multipart/form-data">
                    @csrf
                    <input id="input_slider_img" class="m-0 p-0" type="file" name="archivo">
                    <input type="hidden" name="sucursal" id="" value="{{ $sucursal->id }}">
                    <input type="hidden" name="estado" id="" value="{{ $sucursal->estado }}">
                    <input type="hidden" name="municipio" id="" value="{{ $sucursal->municipio }}">
                    <label class="col-12 m-0 p-2 d-flex justify-content-center align-items-center" for="input_slider_img" style="opacity: 100%; !important; border-radius: 26px; background-color: #44B234;">Seleccionar archivo</label>
                </form>
            </div>
        </div>
        <div class="row">
                                <div class="col text-center">
                                    <small class="text-white">Se recomiendan imágenes mayores a 500 x 500 pixeles.</small>
                                </div>
                            </div>
    </div>

    <div class="container-fluid mt-5 py-5">
        <div class="row">
            @foreach ($galeria as $gal)
                @if ($sucursal->id == $gal->sucursal)
                <div class="col-3 position-relative">
                    <div class="card text-center bg-transparent px-2">
                        <div style="
                            background-image: url('{{ asset('img/photos/sucursales/galeria/'.$gal->foto) }}');
                            background-position: center center;
                            background-repeat: no-repeat;
                            background-size: cover;
                            height: 20rem;
                            width: 100%;
                            border-radius: 1rem;
                        "></div>
                    </div>
                    <div class="col-3 py-3 position-absolute top-0 end-0 translate-middle-y">
                        <form action="{{ route('config.seccion.delSideGaleria', [$gal->id]) }}" method="POST" style="display: inline;">						
                            @csrf
                            @method('DELETE') 
                            <button type="submit" class="btn btn-danger btn-block bg-danger rounded-pill"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
                @endif 
            @endforeach
        </div>
    </div>

@endsection

@section('jsLibExtras2')
<script>
    $('#input_slider_img').change(function(e) {
	    $('#form_image_slider').trigger('submit');
	});
</script>
@endsection

@section('jqueryExtra')

@endsection
