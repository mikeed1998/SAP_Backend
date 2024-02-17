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
            <div class="col-9 position-relative mx-auto">
                <textarea class="col-12 mx-0 scrollux editar_text_seccion_global" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{ $elem_general[5]->id }}" data-table="Elemento" data-campo="texto"  cols="30" rows="8" style="background: #f2f2f2; border:none; border-radius: 10px;">{{ $elem_general[5]->texto }}</textarea>
                <div class="col-1 position-absolute top-0 start-100">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center fs-2 mt-3">
                Estados
            </div>
            <div class="col-12 text-center ">

            </div>
        </div>
        <div class="row">
            <div class="slider-estados">
                @foreach ($estadosdesc as $esta)
                    <div class="col-4 px-2">
                        <div class="card mt-4">
                            <div class="card-title text-center fs-5 mt-3">
                                {{ $esta->estado }}
                            </div>
                            <div class="card-body">
                                <textarea name="" id="" cols="30" rows="10" class="form-control editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{ $esta->id }}" data-table="ZEstado" data-campo="descripcion"  placeholder="Esta descripción aparecerá al hacer clic en algún estado dentro del mapa de la sección HOME">{{ $esta->descripcion }}</textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                                <td class="text-light position-relative" style="width: 20%;">
                                    
                                    <input type="text" class="form-control border border-white text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{ $suc->id }}" data-table="ZSucursal" data-campo="coordX" name="" id="" style="background-color: #212529; border 1px solid #FFFFFF; border-radius: 10px; border:none; color: #FFFFFF;" value="{{ $suc->coordX }}">
                                    <input type="text" class="form-control border border-white text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{ $suc->id }}" data-table="ZSucursal" data-campo="coordX" name="" id="" style="background-color: #212529; border 1px solid #FFFFFF; border-radius: 10px; border:none; color: #FFFFFF;" value="{{ $suc->coordX }}">
                                  
                                    <div class="col-1 position-absolute top-0 start-100 translate-middle">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                    </div>
                                </td>
                                <td class="text-light" style="width: 5%; text-align: center;">
                                    <a href="{{ route('config.seccion.galeria_s', ['id' => $suc->id]) }}" class="btn btn-outline bg-transparent p-0 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" fill="white" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M149.1 64.8L138.7 96H64C28.7 96 0 124.7 0 160V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H373.3L362.9 64.8C356.4 45.2 338.1 32 317.4 32H194.6c-20.7 0-39 13.2-45.5 32.8zM256 192a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/></svg>
                                    </a>
                                </td>
                                <td class="text-light position-relative" style="width: 40%;">
                                    <input type="text" class="col-12 form-control border border-white text-start editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{ $suc->id }}" data-table="ZSucursal" data-campo="sucursal" name="" id="" style="background-color: #212529; border 1px solid #FFFFFF; border-radius: 10px; border:none; color: #FFFFFF;" value="{{ $suc->sucursal }}">
                                    <div class="col-1 position-absolute top-0 start-100 translate-middle">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                    </div>
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
    <div class="modal-dialog modal-lg modal-dialog-centered">
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
            <div class="row">
                <div class="col-6 mb-2">
                    <label for="estados" class="fs-5">Estado de la sucursal</label>
                    <select name="estado" id="estados" class="form-control" required>
                        @foreach ($estados as $es)
                            <option value="{{ $es->id }}">{{ $es->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label for="municipios" class="fs-5">Municipio de la sucursal</label>
                    <select name="municipio" id="municipios" class="form-control" required>
                        @foreach ($municipios as $mun)
                            <option value="{{ $mun->id }}" data-estado="{{ $mun->estado_id }}">{{ $mun->nombre }}</option>
                        @endforeach
                    </select>
                </div>
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
                            Las coordenadas sirven para generar iconos en la parte de contacto, son meramente decorativos e ignorarlas no afectan el funcionamiento del mapa en el INICIO
                        </small>
                        <br>
                        <small class="text-primary">
                            Para generar un icono usando las coordenadas, tienes que ir a google maps, buscar la direcci&oacute;n exacta de la sucursal, dar clic derecho sobre la sucursal (parte exacta del mapa donde se dibuja la sucursal) y aparecer&aacute;n dos n&uacute;meros largos separados por una coma, el primero es la coordenada x y el otro la coordenada y.
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
    $('.slider-estados').slick({
       dots: false,
       infinite: false,
       speed: 300,
       rows: 2,
       slidesPerRow: 3,
    //    slidesToShow: 3,
    //    slidesToScroll: 1,
       centerMode: false,
       responsive: [
       {
           breakpoint: 1200,
           settings: {
               slidesToShow: 3,
               slidesToScroll: 1,
               infinite: true,
               dots: true
           }
       },
       {
           breakpoint: 992,
           settings: {
               slidesToShow: 2,
               slidesToScroll: 1
           }
       },
       {
           breakpoint: 768,
           settings: {
               slidesToShow: 1,
               slidesToScroll: 1
           }
       },
       {
           breakpoint: 576,
           settings: {
               slidesToShow: 1,
               slidesToScroll: 1
           }
       },
       {
           breakpoint: 480,
           settings: {
               slidesToShow: 1,
               slidesToScroll: 1
           }
       }
       ]
   });
</script>
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


