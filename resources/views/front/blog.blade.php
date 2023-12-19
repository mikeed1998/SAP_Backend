@extends('layouts.front')

@section('title', 'Blog')

@section('cssExtras')
    <link rel="stylesheet" href="{{ asset('css/front/blog.css') }}">
@endsection

@section('styleExtras')
@endsection

@section('content')

    <div class="container-fluid px-0 mb-5 mt-5 mb-5" data-aos="fade-up">
        @foreach ($entradas as $ent)
            @if (!($cont % 2 == 0)) 
                <div class="row margen-row" data-aos="fade-up">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-11 col-sm-11 col-11 mx-auto py-2 margen-tema">
                        <div class="row">
                            <div class="col-10 mx-auto titulo-blog">
                                <div class="row">
                                    <!-- <div class="col-5"></div> -->
                                    <div class="col-12 py-3 text-end" style="color: {{ $ent }};">
                                        Titúlo del tema
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-9" style="border: 1px solid {{ $ent }};"></div>
                                </div>
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-11 py-4 texto-blog">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni, porro, est quod dolor dolores adipisci quidem libero quasi minima quam sapiente, dicta deserunt voluptas veniam voluptatum laborum sit praesentium rem.
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-5 col-xl-5 col-lg-3 col-md-3 col-sm-3 col-12"></div>
                                    <div class="col-xxl-7 col-xl-7 col-lg-9 col-md-9 col-sm-9 col-12 mx-xxl-0 mx-xl-0 mx-lg-0 mx-md-0 mx-sm-auto mx-auto text-center">
                                        <a href="#" class="btn btn-outline py-3 fs-5 rounded-pill w-100 boton-blog" style="color: {{ $ent }}; border: 1px solid #BCBCBC;">
                                            <div class="row">
                                                <div class="col-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            LEER MÁS
                                                        </div>
                                                        <div class="col-6 text-end">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="2rem" width="3rem" fill="{{ $ent }}" viewBox="0 0 448 512">
                                                                <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-mx-9 col-sm-11 col-11 mx-auto position-relative margen-col px-0">
                        <div class="col-12 position-absolute top-50 start-50 translate-middle px-0">
                            <div class="row">
                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-2 col-sm-2 col-2 py-2"></div>
                                <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-10 col-sm-10 col-10 py-2 fondo-color" style="background-color: {{ $ent }};"></div>
                            </div>
                        </div>
                        <div class="col-12 position-absolute top-50 start-50 translate-middle px-0">
                            <div class="row">
                                <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-10 col-sm-10 col-10 py-2 mx-auto fondo-imagen" style="background-image: url({{ asset('img/images/blog/blog1.png') }});"></div>
                            </div>
                        </div>
                    </div>
                </div>
            
            @else
                
                <div class="row margen-row" data-aos="fade-up">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-mx-9 col-sm-11 col-11 mx-auto position-relative margen-col px-0">
                        <div class="col-12 position-absolute top-50 start-50 translate-middle px-0">
                            <div class="row">
                                <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-10 col-sm-10 col-10 py-2 fondo-color" style="background-color: {{ $ent }};"></div>
                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-2 col-sm-2 col-2 py-2"></div>
                            </div>
                        </div>
                        <div class="col-12 position-absolute top-50 start-50 translate-middle px-0">
                            <div class="row">
                                <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-10 col-sm-10 col-10 py-2 mx-auto fondo-imagen" style="background-image: url({{ asset('img/images/blog/blog1.png') }});"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-11 col-sm-11 col-11 mx-auto py-2 margen-tema" style="">
                        <div class="row">
                            <div class="col-10 mx-auto titulo-blog">
                                <div class="row">
                                    <!-- <div class="col-5"></div> -->
                                    <div class="col-12 py-3 text-end" style="color: {{ $ent }};">
                                        Titúlo del tema
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-9" style="border: 1px solid {{ $ent }};"></div>
                                </div>
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-11 py-4 texto-blog">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni, porro, est quod dolor dolores adipisci quidem libero quasi minima quam sapiente, dicta deserunt voluptas veniam voluptatum laborum sit praesentium rem.
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-5 col-xl-5 col-lg-3 col-md-3 col-sm-3 col-12"></div>
                                    <div class="col-xxl-7 col-xl-7 col-lg-9 col-md-9 col-sm-9 col-12 mx-xxl-0 mx-xl-0 mx-lg-0 mx-md-0 mx-sm-auto mx-auto text-center">
                                        <a href="#" class="btn btn-outline py-3 fs-5 rounded-pill w-100 boton-blog" style="color: {{ $ent }}; border: 1px solid #BCBCBC;">
                                            <div class="row">
                                                <div class="col-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            LEER MÁS
                                                        </div>
                                                        <div class="col-6 text-end">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="2rem" width="3rem" fill="{{ $ent }}" viewBox="0 0 448 512">
                                                                <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        
            @php
                $cont++;
            @endphp
        @endforeach
    </div>

@endsection

@section('jsLibExtras2')
@endsection
