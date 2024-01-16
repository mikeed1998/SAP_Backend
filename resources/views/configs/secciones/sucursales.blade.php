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

        .filtro::placeholder {
            color: #FFFFFF;
        }

</style>
@endsection

@section('content')
	
    <div class="row mb-4 px-2">
		<a href="{{ route('config.seccion.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

    <div class="container-fluid text-white">
        <div class="row">
            <div class="col-9 mx-auto">
                <textarea class="col-12 mx-0 scrollux editar_text_seccion_global" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{ $elem_general[5]->id }}" data-table="Elemento" data-campo="texto"  cols="30" rows="8" style="background: #f2f2f2; border:none; border-radius: 10px;">{{ $elem_general[5]->texto }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-9 text-center mx-auto fs-3 py-5 h4" style="font-family:'Neusharp Bold'; color: white;">
                <div class="row">
                    <div class="col-12">Agregar sucursal al mapa</div>
                    <div class="col-12"><button style="background: none !important; border:none;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-circle-plus" style="font-size: 2rem; color: white;"></i></button></div>
                </div>
            </div>
        </div>
        <div class="row mt-5 fs-3" style="font-family:'Neusharp Bold'; color: white;">
            <div class="col py-3 text-center">
                Administrar sucursales
            </div>
        </div>
        <div class="row">
            <div class="col py-3 text-center">
                <input class="form-control filtro border border-white text-white" style="background-color: #212529;" id="myInput" type="text" placeholder="Ingresa el nombre del estado o el municipio para filtrar los resultados">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-dark table-hover">
                    <thead class="thead">
                        <tr>
                            <th class="col fs-5 fw-bolder" style="width: 15%;">Estado</th>
                            <th class="col fs-5 fw-bolder" style="width: 15%;">Municipio</th>
                            <th class="col fs-5 fw-bolder" style="width: 20%;">Coordenadas de la sucursal en el mapa (X, Y)</th>
                            <th class="col fs-5 fw-bolder" style="width: 5%;"></th>
                            <th class="col fs-5 fw-bolder" style="width: 40%;">Dirección de la sucursal</th>
                            <th class="col fs-5 fw-bolder" style="width: 5%;"></th>
                        </tr>
                    </thead>
                    <tbody class="tbody" id="myTable">
                        @foreach ($sucursales as $suc)
                            <tr>
                                <td class="text-light" style="width: 15%;">
                                    @foreach ($estados as $esta)
                                        @if ($esta->id == $suc->estado)
                                            {{ $esta->nombre }}
                                            @break
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-light" style="width: 15%;">
                                    @foreach ($municipios as $municip)
                                        @if ($municip->id == $suc->municipio)
                                            {{ $municip->nombre }}
                                            @break
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-light" style="width: 20%;">
                                    
                                    <input type="text" class="form-control border border-white text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{ $suc->id }}" data-table="ZSucursal" data-campo="coordX" name="" id="" style="background-color: #212529; border 1px solid #FFFFFF; border-radius: 10px; border:none; color: #FFFFFF;" value="{{ $suc->coordX }}">
                                    <input type="text" class="form-control border border-white text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{ $suc->id }}" data-table="ZSucursal" data-campo="coordX" name="" id="" style="background-color: #212529; border 1px solid #FFFFFF; border-radius: 10px; border:none; color: #FFFFFF;" value="{{ $suc->coordX }}">
                                  
                                </td>
                                <td class="text-light" style="width: 5%; text-align: center;">
                                    <a href="{{ route('config.seccion.galeria_s', ['id' => $suc->id]) }}" class="btn btn-outline bg-transparent p-0 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" fill="white" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M149.1 64.8L138.7 96H64C28.7 96 0 124.7 0 160V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H373.3L362.9 64.8C356.4 45.2 338.1 32 317.4 32H194.6c-20.7 0-39 13.2-45.5 32.8zM256 192a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/></svg>
                                    </a>
                                </td>
                                <td class="text-light" style="width: 40%;">
                                    <input type="text" class="col-12 form-control border border-white text-start editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{ $suc->id }}" data-table="ZSucursal" data-campo="sucursal" name="" id="" style="background-color: #212529; border 1px solid #FFFFFF; border-radius: 10px; border:none; color: #FFFFFF;" value="{{ $suc->sucursal }}">
                                </td>
                                <td class="text-light" style="width: 5%; text-align: center;">
                                    <form action="{{ route('config.seccion.sucursalDelete', ['sucursal' => $suc->id]) }}" method="POST" enctype="multipart/form-data" id="form-{{ $suc->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline m-0 p-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" fill="red" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                        </button>
                                    </form>
                                    {{-- <a href="{{ route('config.seccion.galeria_s', ['id' => $suc->id]) }}" class="btn btn-outline bg-transparent p-0 m-0">
                                    </a> --}}
                                </td>
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
                <select name="estado" id="estados" class="form-control" required>
                    @foreach ($estados as $es)
                        <option value="{{ $es->id }}">{{ $es->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mb-2">
                <label for="municipios" class="fs-5">Municipios</label>
                <select name="municipio" id="municipios" class="form-control" required>
                    @foreach ($municipios as $mun)
                        <option value="{{ $mun->id }}" data-estado="{{ $mun->estado_id }}">{{ $mun->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mb-2">
                <label for="direccion" class="fs-5">Dirección de la sucursal</label>
                <textarea class="col-12 form-control" id="direccion" name="direccion" id="" rows="5" placeholder="Dirección de la sucursal" required></textarea>
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
                <div class="row">
                    <div class="col">
                        <small>
                            Las coordenadas sirven para generar iconos en la parte de contacto, son meramente decorativos
                        </small>
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
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endsection


