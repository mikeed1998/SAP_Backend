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
            <div class="nosotros-pri" style="background-image: url('{{ asset('img/images/nosotros/nosotros.png') }}');"></div>
        </div>
        <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12 cont-pri">
            <div class="col-10 mx-auto">
                <div class="row">
                    <div class="col-12 titu-1">
                        Conoce un poco sobre
                    </div>
                    <div class="col-12 titu-2">
                        NOSOTROS
                    </div>
                </div>
                <div class="row">
                    <div class="col py-5 text-white titu-text">
                        Lorem Lorem ipsum dolor Lorem ipsum dolor sit elit. Placeat, ipsa? sit amet, consectetur adipisicing elit. Laboriosam delectus tempora similique adipisci ipsam culpa molestiae cumque ad, accusamus deleniti! Modi maiores vel deserunt blanditiis eligendi, nostrum vitae. Possimus, dolor. ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos omnis suscipit quis iure repellendus porro ea consequatur! Mollitia nemo tempore consequatur, illo libero fugit voluptates laudantium. Rem quos voluptatum sunt!
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
                    NO ESPERES MÁS
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-11 col-11 mx-auto text-center nosotros-2">
                    ANUNCIATE CON LOS MEJORES
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-11 col-11 mx-auto text-center nosotros-3">
                    Lorem ipsum Lorem ipsum dolor sit amet Lorem ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, optio? consectetur adipisicing elit. Unde eligendi accusamus ea ullam perferendis eaque voluptatibus facilis odio nulla quos. dolor sit amet consectetur adipisicing elit. Culpa vitae quasi porro modi cupiditate perferendis omnis eaque nobis quaerat distinctio!
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
                    <div class="card border-0 px-5">
                        <div class="col position-relative border border-dark py-5">
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-100 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-100 translate-middle"></div>
                            <div class="row">
                                <div class="col-9 mx-auto pt-3 titulo-card">
                                    Misión
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9 py-5 mx-auto texto-card">
                                    Lorem, ipsum dolor sit amet consectetur elit. Eligendi nemo, laudantium cumque labore, porro doloremque quasi quos incidunt dolore dolores aspernatur sint saepe illum tempora eum distinctio sapiente velit!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-9 col-sm-11 col-12 mx-auto py-5">
                    <div class="card border-0 px-5">
                        <div class="col position-relative border border-dark py-5">
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-100 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-100 translate-middle"></div>
                            <div class="row">
                                <div class="col-9 mx-auto pt-3 titulo-card">
                                    Visión
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9 py-5 mx-auto texto-card">
                                    Lorem, ipsum dolor sit amet consectetur elit. Eligendi nemo, laudantium cumque labore, porro doloremque quasi quos incidunt dolore dolores aspernatur sint saepe illum tempora eum distinctio sapiente velit!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-9 col-sm-11 col-12 mx-auto py-5">
                    <div class="card border-0 px-5">
                        <div class="col position-relative border border-dark py-5">
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-0 start-100 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-0 translate-middle"></div>
                            <div class="col-3 bg-white py-5 position-absolute top-100 start-100 translate-middle"></div>
                            <div class="row">
                                <div class="col-9 mx-auto pt-3 titulo-card">
                                    Valores
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9 py-5 mx-auto texto-card">
                                    <ul>
                                        <li>Lorem ipsum dolor.</li>
                                        <li>Lorem ipsum dolor.</li>
                                        <li>Lorem ipsum dolor.</li>
                                        <li>Lorem ipsum dolor.</li>
                                        <li>Lorem ipsum dolor.</li>
                                        <li>Lorem ipsum dolor.</li>
                                        <li>Lorem ipsum dolor.</li>
                                    </ul>
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
                                    EXCLUSIVIDAD
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-3 texto-nos">
                                    Tu marca siempre en las mejores ubicaciones.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 mt-5 mx-auto">
                            <div class="row">
                                <div class="col py-2 rounded-pill titulo-nos">
                                    EXPERIENCIA
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-3 texto-nos">
                                    25 años trabajando con las mejores marcas y agencias.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 mt-5 mx-auto">
                            <div class="row">
                                <div class="col py-2 rounded-pill titulo-nos">
                                    SEGURIDAD
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-3 texto-nos">
                                    Contratos formales y tratos serios, tranquilidad y garantia.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 mt-5 mx-auto">
                            <div class="row">
                                <div class="col py-2 rounded-pill titulo-nos">
                                    LEGALIDAD
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-3 texto-nos">
                                    Estructuras que operan con las autorizaciones legales
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-11 col-sm-11 col-12 mx-auto cont-img">
                    <div class="row">
                        <div class="col-11 mx-auto">
                            <div class="row">
                                <div class="col imagen-nos" style="background-image: url('{{ asset('img/images/nosotros/nos2.png') }}');"></div>
                            </div>
                            <div class="row">
                                <div class="col imagen-nos" style="background-image: url('{{ asset('img/images/nosotros/nos1.png') }}');"></div>
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
