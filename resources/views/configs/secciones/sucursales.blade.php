@extends('layouts.admin')
@section('cssExtras')

@endsection
@section('jsLibExtras')

@endsection

@section('styleExtras')
<style>
    #estados, #municipios {
            max-height: 6rem; /* Ajusta según tus necesidades */
            overflow-y: auto;
        }
</style>
@endsection

@section('content')
	
    <div class="row mb-4 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

    <div class="container-fluid text-white">
        <div class="row">
            <div class="col-9 mx-auto">
                <textarea name="descripcion" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-9 text-center mx-auto fs-3 py-2">
                Agregar sucursal al mapa
            </div>
            <div class="col-9 mx-auto py-3">
                <div class="row">
                    <div class="col-3 mx-auto">
                        <label for="estados" class="fs-5">Estado</label>
                        <select name="estados" id="estados" class="form-control">
                            @foreach ($estados as $es)
                                <option value="{{ $es->id }}">{{ $es->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 mx-auto">
                        <label for="municipios" class="fs-5">Municipios</label>
                        <select name="municipios" id="municipios" class="form-control">
                            @foreach ($municipios as $mun)
                                <option value="{{ $mun->id }}" data-estado="{{ $mun->estado_id }}">{{ $mun->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 mx-auto">
                            
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('jsLibExtras2')

@endsection
@section('jqueryExtra')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log("Antes de ocultar/mostrar el select de municipios");
        // Ocultar el select de municipios al principio
        // document.getElementById('municipios').style.display = 'none';

        // Asociar un evento change al select de estados
        document.getElementById('estados').addEventListener('change', function () {
            console.log("Cambio en el estado detectado.");
            var estadoSeleccionado = this.value;
            console.log(estadoSeleccionado);

            // Ocultar todos los municipios al principio
            console.log("Antes de ocultar/mostrar el select de municipios");
            var municipiosOptions = document.querySelectorAll('#municipios option');
            municipiosOptions.forEach(function (option) {
                option.style.display = 'none';
            });

            console.log("Antes de ocultar/mostrar el select de municipios");
            // Mostrar solo los municipios relacionados con el estado seleccionado
            var municipiosOptionsToShow = document.querySelectorAll('#municipios option[data-estado="' + estadoSeleccionado + '"]');
            municipiosOptionsToShow.forEach(function (option) {
                option.style.display = 'block';
            });

            // Seleccionar el primer municipio visible (si hay alguno)
            var primerMunicipio = municipiosOptionsToShow[0];
            document.getElementById('municipios').value = primerMunicipio ? primerMunicipio.value : '';

            console.log("Mostrando/Mostrando el select de municipios");
            if (municipiosOptionsToShow.length > 0) {
                document.getElementById('municipios').style.display = 'block';
            } else {
                document.getElementById('municipios').style.display = 'none';
            }
            console.log("Fin del condicional");
        });
    });
</script>
@endsection
