@extends('layouts.front')

@section('title', 'Contacto')

@section('cssExtras')
    <link rel="stylesheet" href="{{ asset('css/front/contacto.css') }}">
@endsection

@section('styleExtras')
<style>
    #map { 
        height: 780px; 
    }
</style>
@endsection

@section('content')



<div class="container-fluid bg-white">
    <div class="row mt-5" data-aos="zoom-in">
        <div class="col-11 mx-auto mt-5 py-5">
            <div class="row">
                <div class="col text-center fw-bolder titulo-contacto">
                    Déjanos un MENSAJE, NOS PONEMOS en contacto
                </div>
            </div>
        </div>
    </div>
        <div class="row formu-grande pb-5" data-aos="zoom-in">
            <form action="" id="form-grande">
                <div class="col-11 mx-auto">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-9 mx-auto position-relative">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-8 fs-4 mx-auto" style="line-height: 1.1; margin-top: 4rem; text-decoration: underline;">
                                        TEL. 4776363191
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 fs-4 mx-auto" style="line-height: 1.1; margin-top: 3rem; text-decoration: underline;">
                                        contacto@sap.com.mx
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto py-2" style="margin-top: 3rem;">
                                        <div class="row">
                                            <div class="col-xxl-8 col-xl-9 col-lg-11">
                                                <div class="row">
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 text-center mx-auto" style="border-radius: 100%; padding: 0.75rem; background-color: #201E1F;">
                                                        <a href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 text-center mx-auto" style="border-radius: 100%; padding: 0.75rem; background-color: #201E1F;">
                                                        <a href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="bi bi-facebook" viewBox="0 0 16 16">
                                                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 text-center mx-auto" style="border-radius: 100%; padding: 0.75rem; background-color: #201E1F;">
                                                        <a href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="bi bi-instagra" viewBox="0 0 16 16">
                                                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-8 col-xl-8 col-lg-9 mx-auto text-center" style="margin-top: 10rem;">
                                        <button type="submit" class="btn btn-outline rounded-pill py-3 w-100" style="background-color: #201E1F; color: #FFFFFF;">
                                            <div class="row">
                                                <div class="col-8 text-end position-relative">
                                                    ENVÍA MENSAJE
                                                    <div class="col-4 text-start position-absolute top-50 start-100 translate-middle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.6rem" width="6rem" viewBox="0 0 448 512" fill="#FFFFFF"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                                                    </div>
                                                </div>
                                            </div>    
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-9 mx-auto position-relative py-3">
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Nombre" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Empresa" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="number" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Whatsapp" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="email" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Email" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Asunto" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Mensaje" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>

        <div class="row formu-small pb-5" data-aos="zoom-in">
            <form action="" id="form-small">
                <div class="col-11 mx-auto">
                    <div class="row">
                        
                        <div class="col-md-9 col-sm-12 col-12 mx-auto position-relative py-3">
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Nombre" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Empresa" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="number" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Whatsapp" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="email" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Email" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Asunto" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-4">
                                    <input type="text" class="form-control fs-3 bg-transparent rounded-0"  placeholder="Mensaje" style="border-bottom: 2px solid black; border-top: 0; border-right: 0; border-left: 0; box-shadow: none;">
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-md-9 col-sm-12 col-12 mx-auto position-relative">
                            <div class="row">
                                <div class="col-md-6 col-sm-9 col-9 mx-auto text-center">
                                    <button type="submit" class="btn btn-outline rounded-pill py-3 w-100" style="background-color: #201E1F; color: #FFFFFF;">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8 col-8 text-center position-relative">
                                                ENVÍA MENSAJE
                                                <div class="col-4 text-start position-absolute top-50 start-100 translate-middle">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.6rem" width="6rem" viewBox="0 0 448 512" fill="#FFFFFF"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                                                </div>
                                            </div>
                                        </div>    
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-8 fs-4 mx-auto" style="line-height: 1.1; margin-top: 4rem; text-decoration: underline;">
                                        TEL. 4776363191
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 fs-4 mx-auto" style="line-height: 1.1; margin-top: 3rem; text-decoration: underline;">
                                        contacto@sap.com.mx
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto py-2" style="margin-top: 3rem;">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-11 col-12">
                                                <div class="row">
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 text-center mx-auto" style="border-radius: 100%; padding: 0.75rem; background-color: #201E1F;">
                                                        <a href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 text-center mx-auto" style="border-radius: 100%; padding: 0.75rem; background-color: #201E1F;">
                                                        <a href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="bi bi-facebook" viewBox="0 0 16 16">
                                                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 text-center mx-auto" style="border-radius: 100%; padding: 0.75rem; background-color: #201E1F;">
                                                        <a href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="bi bi-instagra" viewBox="0 0 16 16">
                                                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
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
            </form>
        </div>
</div>

<div class="container-fluid px-0">
    <div class="row">
        <div class="col">
            <div id="map"></div>
            <script>
                // Coordenadas aproximadas del centro de México
                var latitud = 23.6345;
                var longitud = -102.5528;
            
     
                // Inicializa el mapa
                var mymap = L.map('map').setView([latitud, longitud], 6);
            
                // Agrega un mapa base de OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors'
                }).addTo(mymap);
            </script>

            @foreach ($sucursales as $sucu)
                <script>
                    var coordX = {{ $sucu->coordX }};
                    var coordY = {{ $sucu->coordY }};
                    var sucursalPopup = L.popup().setContent('{{ $sucu->sucursal }}');

                    // Agrega marcadores
                    var marker = L.marker([coordX, coordY]).addTo(mymap);

                    // Asigna el popup al marcador y agrega el evento click
                    marker.bindPopup(sucursalPopup);

                    marker.on('click', function () {
                        marker.openPopup();
                    }); 
                </script>
            @endforeach
            
        </div>
    </div>
</div>

@endsection

@section('jqueryExtra')

 <script>
    document.addEventListener('DOMContentLoaded', function () {
        var tituloBolsa = document.querySelector('.titulo-contacto');

        // Obtén el texto del elemento
        var texto = tituloBolsa.textContent;

        // Separa el texto en palabras
        var palabras = texto.split(/\s+/);

        // Aplica estilos según si la palabra es mayúscula o minúscula
        var resultado = palabras.map(function (palabra) {
            if (palabra === palabra.toUpperCase()) {
                return '<span class="mayuscula">' + palabra + '</span>';
            } else {
                return '<span class="minuscula">' + palabra + '</span>';
            }
        });

        // Actualiza el contenido con los estilos aplicados
        tituloBolsa.innerHTML = resultado.join(' ');
    });
</script>
@endsection



{{-- <script>
    // Coordenadas aproximadas del centro de México
    var latitud = 23.6345;
    var longitud = -102.5528;

    var guadalajaraLa = 20.66682;
    var guadalajaraLo = -103.39182;

    var monterreyLa = 25.67507;
    var monterreyLo = -100.31847;

    // Inicializa el mapa
    var mymap = L.map('map').setView([latitud, longitud], 6);

    // Agrega un mapa base de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(mymap);

    // Agrega un marcador en el centro de México
    // L.marker([latitud, longitud]).addTo(mymap)
    //     .bindPopup('¡México!')
    //     .openPopup();

    // Agrega marcadores
    L.marker([guadalajaraLa, guadalajaraLo]).addTo(mymap)
        .bindPopup('Guadalajara')
        .openPopup();

    // Agrega marcadores
    L.marker([monterreyLa, monterreyLo]).addTo(mymap)
        .bindPopup('Monterrey')
        .openPopup();

</script> --}}