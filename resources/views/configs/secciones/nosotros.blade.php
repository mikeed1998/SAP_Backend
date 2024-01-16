@extends('layouts.admin')

@section('title', 'Nosotros')

@section('cssExtras')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('css/front/nosotros.css') }}">
@endsection

@section('styleExtras')

@endsection

@section('content')

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

<div class="row mb-4 px-2">
    <a href="{{ route('config.seccion.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto rounded-pill"><i class="fa fa-reply"></i> Regresar</a>
</div>


<div class="container-fluid text-dark">
    <div class="row">
        <div class="col-xxl-7 col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12 p-0 position-relative">
            <div class="nosotros-pri" style="background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[0]->imagen) }}');"></div>
            <div class="col-12 position-absolute top-50 start-50 translate-middle">
                <form id="form_aux2" action="image_input_ejemplo" method="POST" class="file-upload px-auto col-7" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_elemento" value="{{ $elements[0]->id }}">
                    <input id="img_aux2" class="m-0 p-0" type="file" name="archivo">
                    <label class="col-12 m-0 px-2 d-flex justify-content-center align-items-center" for="img_aux2" style=" height: 100%; opacity: 100%; border-radius: 20px;">Seleccionar archivo</label>
                </form>
                <script>
                    $('#img_aux2').change(function(e) {
                        $('#form_aux2').trigger('submit');
                    });
                </script>
            </div>
        </div>
        <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12 cont-pri">
            <div class="col-10 mx-auto">
                <div class="row">
                    <div class="col-12 position-relative titu-1">
                        <textarea class="col-12 fs-3 py-2 text-dark fw-bolder text-start editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[1]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="1" style="border-radius: 10px; border:none; background: #ededed">{{$elements[1]->texto}}</textarea>
                        <div class="col-1 position-absolute top-0 start-100">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                        </div>
                    </div>
                    <div class="col-12 display-1" style="color: #FE6E63;">
                        NOSOTROS
                    </div>
                </div>
                <div class="row">
                    <div class="col position-relative py-5 text-white titu-text">
                        <textarea class="col-12 text-start editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[2]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="8" style="border-radius: 10px; border:none; background: #ededed">{{$elements[2]->texto}}</textarea>
                        <div class="col-1 position-absolute top-0 start-100">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col nosotros-bg" style="background-image: url('{{ asset('img/images/nosotros/fondo.png') }}');">
            <div class="row">
                <div class="col-6 position-relative mx-auto text-center nosotros-1">
                    <textarea class="col-12 fs-5 text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[3]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="1" style="border-radius: 10px; border:none; background: #ededed">{{$elements[3]->texto}}</textarea>
                    <div class="col-1 position-absolute top-0 start-100">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-11 col-11 mx-auto text-center position-relative nosotros-2">
                    <textarea class="col-12 display-3 m-0 p-0 fw-bolder text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[4]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="3" style="border-radius: 10px; border:none; background: #ededed">{{$elements[4]->texto}}</textarea>
                    <div class="col-1 position-absolute top-0 start-100">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-11 col-11 mx-auto text-center position-relative nosotros-3">
                    <textarea class="col-12 text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[5]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="4" style="border-radius: 10px; border:none; background: #ededed">{{$elements[5]->texto}}</textarea>
                    <div class="col-1 position-absolute top-0 start-100">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-white py-5">
    <div class="row">
        <div class="col-11 mx-auto">
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-9 col-sm-11 col-12 mx-auto py-5">
                    <div class="card border-0 px-2">
                        <div class="col position-relative border border-dark py-5">
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-100 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-100 translate-middle"></div>
                            <div class="row">
                                <div class="col-9 position-relative mx-auto pt-3 titulo-card">
                                    <textarea class="col-12 text-start editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[6]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="1" style="border-radius: 10px; border:none; background: #ededed">{{$elements[6]->texto}}</textarea>
                                    <div class="col-1 position-absolute top-0 start-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9 position-relative py-5 mx-auto texto-card">
                                    <textarea class="col-12 text-start editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[7]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="10" style="border-radius: 10px; border:none; background: #ededed">{{$elements[7]->texto}}</textarea>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-9 col-sm-11 col-12 mx-auto py-5">
                    <div class="card border-0 px-2">
                        <div class="col position-relative border border-dark py-5">
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-100 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-100 translate-middle"></div>
                            <div class="row">
                                <div class="col-9 position-relative mx-auto pt-3 titulo-card">
                                    <textarea class="col-12 text-start editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[8]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="1" style="border-radius: 10px; border:none; background: #ededed">{{$elements[8]->texto}}</textarea>
                                    <div class="col-1 position-absolute top-0 start-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9 py-5 mx-auto texto-card">
                                    <textarea class="col-12 editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[9]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="10" style="border-radius: 10px; border:none; background: #ededed">{{$elements[9]->texto}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-9 col-sm-11 col-12 mx-auto py-5">
                    <div class="card border-0 px-2">
                        <div class="col position-relative border border-dark py-5">
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-100 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-100 translate-middle"></div>
                            <div class="row">
                                <div class="col-9 position-relative mx-auto pt-3 titulo-card">
                                    <textarea class="col-12 text-start editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[10]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="1" style="border-radius: 10px; border:none; background: #ededed">{{$elements[10]->texto}}</textarea>
                                    <div class="col-1 position-absolute top-0 start-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9 py-5 mx-auto texto-card">
                                    <textarea class="col-12 editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[11]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="10" style="border-radius: 10px; border:none; background: #ededed">{{$elements[11]->texto}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-white py-5">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-11 col-sm-11 col-12 mx-auto ">
                    <div class="row">
                        <div class="col-9 mt-5 mx-auto">
                            <div class="row">
                                <div class="col position-relative py-2 rounded-pill titulo-nos">
                                    <textarea class="col-12 text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[12]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="1" style="border-radius: 10px; border:none; background: transparent">{{$elements[12]->texto}}</textarea>
                                    <div class="col-1 position-absolute top-0 start-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col position-relative py-3 texto-nos">
                                    <textarea class="col-12 editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[13]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="2" style="border-radius: 10px; border:none; background: #ededed;">{{$elements[13]->texto}}</textarea>
                                    <div class="col-1 position-absolute top-0 start-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 mt-5 mx-auto">
                            <div class="row">
                                <div class="col position-relative py-2 rounded-pill titulo-nos">
                                    <textarea class="col-12 text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[14]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="1" style="border-radius: 10px; border:none; background: transparent">{{$elements[14]->texto}}</textarea>
                                    <div class="col-1 position-absolute top-0 start-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col position-relative py-3 texto-nos">
                                    <textarea class="col-12 text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[15]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="2" style="border-radius: 10px; border:none; background: #ededed">{{$elements[15]->texto}}</textarea>
                                    <div class="col-1 position-absolute top-0 start-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 mt-5 mx-auto">
                            <div class="row">
                                <div class="col position-relative py-2 rounded-pill titulo-nos">
                                    <textarea class="col-12 text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[16]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="1" style="border-radius: 10px; border:none; background: transparent">{{$elements[16]->texto}}</textarea>
                                    <div class="col-1 position-absolute top-0 start-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col position-relative py-3 texto-nos">
                                    <textarea class="col-12 text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[17]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="2" style="border-radius: 10px; border:none; background: #ededed">{{$elements[17]->texto}}</textarea>
                                    <div class="col-1 position-absolute top-0 start-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 mt-5 mx-auto">
                            <div class="row">
                                <div class="col position-relative py-2 rounded-pill titulo-nos">
                                    <textarea class="col-12 text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[18]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="1" style="border-radius: 10px; border:none; background: transparent">{{$elements[18]->texto}}</textarea>
                                    <div class="col-1 position-absolute top-0 start-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col position-relative py-3 texto-nos">
                                    <textarea class="col-12 text-center editar_text_seccion_global editarajax" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[19]->id}}" data-table="Elemento" data-campo="texto" name="" id="" cols="30" rows="2" style="border-radius: 10px; border:none; background: #ededed">{{$elements[19]->texto}}</textarea>
                                    <div class="col-1 position-absolute top-0 start-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#FFC000" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-11 col-sm-11 col-12 mx-auto cont-img">
                    <div class="row">
                        <div class="col-11 mx-auto">
                            <div class="row">
                                <div class="col imagen-nos position-relative" style="background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[20]->imagen) }}');">
                                    <div class="col-12 position-absolute top-50 start-50 translate-middle">
                                        <form id="form_aux3" action="image_input_ejemplo" method="POST" class="file-upload px-auto col-7" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id_elemento" value="{{ $elements[20]->id }}">
                                            <input id="img_aux3" class="m-0 p-0" type="file" name="archivo">
                                            <label class="col-12 py-5 m-0 px-2 d-flex justify-content-center align-items-center" for="img_aux3" style=" height: 100%; opacity: 100%; border-radius: 20px;">Cambiar imagen</label>
                                        </form>
                                        <script>
                                            $('#img_aux3').change(function(e) {
                                                $('#form_aux3').trigger('submit');
                                            });
                                        </script>
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col imagen-nos position-relative" style="background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[21]->imagen) }}');">
                                    <div class="col-12 position-absolute top-50 start-50 translate-middle">
                                        <form id="form_aux4" action="image_input_ejemplo" method="POST" class="file-upload px-auto col-7" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id_elemento" value="{{ $elements[21]->id }}">
                                            <input id="img_aux4" class="m-0 p-0" type="file" name="archivo">
                                            <label class="col-12 py-5 m-0 px-2 d-flex justify-content-center align-items-center" for="img_aux4" style=" height: 100%; opacity: 100%; border-radius: 20px;">Cambiar imagen</label>
                                        </form>
                                        <script>
                                            $('#img_aux4').change(function(e) {
                                                $('#form_aux4').trigger('submit');
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
