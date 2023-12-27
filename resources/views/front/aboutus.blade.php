@extends('layouts.front')

@section('title', 'Nosotros')

@section('cssExtras')
    <link rel="stylesheet" href="{{ asset('css/front/nosotros.css') }}">
@endsection

@section('styleExtras')

@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xxl-7 col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12 p-0">
            <div class="nosotros-pri" style="background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[0]->imagen) }}');"></div>
        </div>
        <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12 cont-pri">
            <div class="col-10 mx-auto">
                <div class="row">
                    <div class="col-12 titu-1">
                        {{ $elements[1]->texto }}
                    </div>
                    <div class="col-12 titu-2">
                        NOSOTROS
                    </div>
                </div>
                <div class="row">
                    <div class="col py-5 text-white titu-text">
                        {{ $elements[2]->texto }}
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
                <div class="col text-center nosotros-1">
                    {{ $elements[3]->texto }}
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-11 col-11 mx-auto text-center nosotros-2">
                    {{ $elements[4]->texto }}
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-11 col-11 mx-auto text-center nosotros-3">
                    {{ $elements[5]->texto }}
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
                    <div class="card border-0 px-4">
                        <div class="col position-relative border border-dark py-5">
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-100 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-100 translate-middle"></div>
                            <div class="row">
                                <div class="col-9 mx-auto pt-3 titulo-card">
                                    {{ $elements[6]->texto }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9 py-5 mx-auto texto-card">
                                    {{ $elements[7]->texto }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-9 col-sm-11 col-12 mx-auto py-5">
                    <div class="card border-0 px-4">
                        <div class="col position-relative border border-dark py-5">
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-100 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-100 translate-middle"></div>
                            <div class="row">
                                <div class="col-9 mx-auto pt-3 titulo-card">
                                    {{ $elements[8]->texto }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9 py-5 mx-auto texto-card">
                                    {{ $elements[9]->texto }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-9 col-sm-11 col-12 mx-auto py-5">
                    <div class="card border-0 px-4">
                        <div class="col position-relative border border-dark py-5">
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-100 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-100 translate-middle"></div>
                            <div class="row">
                                <div class="col-9 mx-auto pt-3 titulo-card">
                                    {{ $elements[10]->texto }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9 py-5 mx-auto texto-card">
                                    {{ $elements[11]->texto }}
                                    {{-- <ul>
                                        <li>Lorem ipsum dolor.</li>
                                        <li>Lorem ipsum dolor.</li>
                                        <li>Lorem ipsum dolor.</li>
                                        <li>Lorem ipsum dolor.</li>
                                        <li>Lorem ipsum dolor.</li>
                                        <li>Lorem ipsum dolor.</li>
                                        <li>Lorem ipsum dolor.</li>
                                    </ul> --}}
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
        <div class="col-11 mx-auto">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-11 col-sm-11 col-12 mx-auto ">
                    <div class="row">
                        <div class="col-9 mt-5 mx-auto">
                            <div class="row">
                                <div class="col py-2 rounded-pill titulo-nos">
                                    {{ $elements[12]->texto }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-3 texto-nos">
                                    {{ $elements[13]->texto }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 mt-5 mx-auto">
                            <div class="row">
                                <div class="col py-2 rounded-pill titulo-nos">
                                    {{ $elements[14]->texto }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-3 texto-nos">
                                    {{ $elements[15]->texto }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 mt-5 mx-auto">
                            <div class="row">
                                <div class="col py-2 rounded-pill titulo-nos">
                                    {{ $elements[16]->texto }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-3 texto-nos">
                                    {{ $elements[17]->texto }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 mt-5 mx-auto">
                            <div class="row">
                                <div class="col py-2 rounded-pill titulo-nos">
                                    {{ $elements[18]->texto }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-3 texto-nos">
                                    {{ $elements[19]->texto }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-11 col-sm-11 col-12 mx-auto cont-img">
                    <div class="row">
                        <div class="col-11 mx-auto">
                            <div class="row">
                                <div class="col imagen-nos" style="background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[20]->imagen) }}');"></div>
                            </div>
                            <div class="row">
                                <div class="col imagen-nos" style="background-image: url('{{ asset('img/photos/imagenes_estaticas/'.$elements[21]->imagen) }}');"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('jqueryExtra')

@endsection
