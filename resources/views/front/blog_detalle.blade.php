@extends('layouts.front')

@section('title', 'Home')

@section('cssExtras')
    <link rel="stylesheet" href="{{ asset('css/front/blog_detalle.css') }}">
    <meta property="og:url"           content="http://192.168.0.101:8000/blog_detalle/{{ $blog->id }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $blog->titulo }}" />
    <meta property="og:description"   content="{{ $blog->resumen }}" />
    <meta property="og:image"         content="{{ asset('img/photos/blog/'.$blog->portada) }}" />
@endsection

@section('styleExtras')
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col py-5 text-center fw-bolder text-white display-1 text-decoration-underline">
            {{ $blog->titulo }}
        </div>
    </div>
    <div class="row">
        <div class="col portada-post" style="background-image: url('{{ asset('img/photos/blog/'.$blog->portada) }}');"></div>
    </div>
</div>

<div class="container-fluid bg-white py-5">
    <div class="row mt-5">
        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-10 col-sm-11 col-11 mx-auto">
            <div class="row">
                <div class="col">
                    {!! $blog->post !!}
                </div>
            </div>
            
        </div>
        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-10 col-sm-9 col-9 mt-5 mx-auto">
            <div class="row">
                <div class="col" style="border-top: 1px solid #BBBBBB; border-bottom: 1px solid #BBBBBB;">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 fs-4 py-3">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('front.blog') }}" style="text-decoration: underline; color: #FFC000;">Regresar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-4 col-sm-6 col-6">
                            <div class="row">
                                <div class="col fs-4 text-end py-3" style="color: #BBBBBB;">
                                    Comparte: 
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-3 py-3 mx-auto">
                                    <a href="https://api.whatsapp.com/send?text=https://proyectoswozial.com/SAP/blog_detalle/{{ $blog->id }}" target="_blank" class="btn btn-outline">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="21" fill="#FFC000" viewBox="0 0 448 512">
                                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                            <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="col-3 py-3 mx-auto">
                                    <a href="http://facebook.com/share.php?u=https://proyectoswozial.com/SAP/blog_detalle/{{ $blog->id }}" target="_blank" class="btn btn-outline">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="21" fill="#FFC000" viewBox="0 0 320 512">
                                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                            <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="col-3 py-3 mx-auto">
                                    <a href="https://www.instagram.com/?url=https://proyectoswozial.com/SAP/blog_detalle/{{ $blog->id }}" target="_blank" class="btn btn-outline">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="21" fill="#FFC000" viewBox="0 0 448 512">
                                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                                        </svg>
                                    </a>
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

@section('jsLibExtras2')
@endsection
