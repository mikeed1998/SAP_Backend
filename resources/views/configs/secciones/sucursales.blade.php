@extends('layouts.admin')
@section('cssExtras')

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
            <div class="col-9 text-center mx-auto fs-3 py-5 h4" style="font-family:'Neusharp Bold'; color: white;">
                <div class="row">
                    <div class="col-12">Agregar sucursal al mapa</div>
                    <div class="col-12"><button style="background: none !important; border:none;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-circle-plus" style="font-size: 2rem; color: white;"></i></button></div>
                </div>
            </div>
            {{-- <div class="col-9 mx-auto py-3">
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
                    <div class="col-6 mx-auto">
                        <label for="direccion" class="fs-5">Dirección de la sucursal</label>
                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="">
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row mt-5 fs-3" style="font-family:'Neusharp Bold'; color: white;">
            <div class="col py-3 text-center">
                Administrar sucursales
            </div>
        </div>
        <div class="row">
            <div class="col py-3 text-center">
                Poner la barra de busqueda que filtra por estado o municipio
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-dark table-hover">
                    <thead class="thead">
                        <tr>
                            <th class="col fs-5">Estado</th>
                            <th class="col fs-5">Municipio</th>
                            <th class="col fs-5" colspan="2">Coordenadas de la sucursal (X, Y)</th>
                            <th class="col fs-5">Dirección de la sucursal</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        @foreach ($sucursales as $suc)
                            <tr>
                                <td class="fs-5 text-light">
                                    @foreach ($estados as $esta)
                                        @if ($esta->id == $suc->estado)
                                            {{ $esta->nombre }}
                                            @break
                                        @endif
                                    @endforeach
                                </td>
                                <td class="fs-5 text-light">
                                    @foreach ($municipios as $municip)
                                        @if ($municip->id == $suc->municipio)
                                            {{ $municip->nombre }}
                                            @break
                                        @endif
                                    @endforeach
                                </td>
                                <td class="fs-5 text-light">1234567890</td>
                                <td class="fs-5 text-light">-1234567890</td>
                                <td class="fs-5 text-light">{{ $suc->sucursal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<form action="{{ route('config.seccion.sucursalCreate') }}" method="POST" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" enctype="multipart/form-data">
    <div class="modal-dialog modal-dialog-centered">
    <div  class="modal-content" style="border-radius: 16px;" >
        @csrf
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar sucursal al mapa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <style>
                .backr{
                    background: #1555bc !important;
                }
            </style>
            <div class="col-12 mb-2">
                <label for="estados" class="fs-5">Estado</label>
                <select name="estado" id="estados" class="form-control">
                    @foreach ($estados as $es)
                        <option value="{{ $es->id }}">{{ $es->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mb-2">
                <label for="municipios" class="fs-5">Municipios</label>
                <select name="municipio" id="municipios" class="form-control">
                    @foreach ($municipios as $mun)
                        <option value="{{ $mun->id }}" data-estado="{{ $mun->estado_id }}">{{ $mun->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mb-2">
                <label for="direccion" class="fs-5">Dirección de la sucursal</label>
                <textarea class="col-12 form-control" id="direccion" name="direccion" id="" rows="5" placeholder="Dirección de la sucursal"></textarea>
            </div>
            <div class="col-12 mt-3">
                <div class="row">
                    <div class="col fs-5 text-center">
                        Coordenadas de la sucursal (No es obligatorio)
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-center">
                        <label for="coordX">X</label>
                    </div>
                    <div class="col-6 text-center">
                        <label for="coordY">Y</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="coordX" id="coordX" class="form-control">
                    </div>
                    <div class="col-6">
                        <input type="text" name="coordY" id="coordY" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="btn btn-secondary" data-bs-dismiss="modal" style="background: red !important; border:none;">Cerrar</div>
            <button type="submit" class="btn btn-primary" style="background: #1555bc !important; border:none;">Agregar</button>
        </div>
    </div>
    </div>
</form>

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
