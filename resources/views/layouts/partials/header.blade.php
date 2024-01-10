    
    <style>
        
        @font-face {
            font-family: 'Sansation Bold';
            src: url("{{ asset('fonts/Sansation-Bold/Sansation_Bold.ttf') }}") format('truetype');
            font-weight: normal;
            font-style: normal;
        }

    </style>
    
    <header class="header-menu" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="500">
        <div class="container-fluid" style="background-color: #000000;"> {{--  style="background-color: #201E1F;" --}}
            <div class="row px-5">
                <div class="col px-5 mx-auto py-3 position-relative" style="flex-grow: 1;">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-11 col-11 mx-auto ">
                            <div class="row py-xxl-0 py-xl-0 py-lg-0 py-md-0 py-sm-3 py-3">
                                <div class="col-xxl-11 col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 text-start">
                                    <a href="{{ route('front.index') }}"><img src="{{ asset('img/logo_animado.gif') }}" alt="sap" class="img-fluid" style="width: 15rem; height: 8rem;"></a>
                                </div>
                                
                            </div>
                        </div>
                        {{-- <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-3 d-xxl-block d-xl-block d-lg-block d-md-block d-sm-none d-none mx-auto position-relative"> --}}
                            <div class="col-xxl-4 col-xl-4 col-lg-4 d-xxl-block d-xl-block d-lg-block d-md-none d-sm-none d-none mx-auto">
                                <div class="row mt-3">
                                    <div class="col-xxl-9 col-xl-10 col-lg-12 col-md-9 col-sm-9 col-12  mx-auto text-center">
                                        <a href="{{ route('front.contact') }}" class="btn btn-outline py-3 fs-5 fw-bolder rounded-pill w-100 text-white" style="background-color: #FE6E62; font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bold;">
                                            COTIZAR AQUÍ <svg xmlns="http://www.w3.org/2000/svg" height="1.4rem" width="3rem" fill="#000000" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        {{-- </div> --}}
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-9 col-9 mx-auto ">
                            <div class="row">
                                
                                <div class="col-xxl-3 col-xl-3 col-lg-1 col-md-4 d-flex align-items-center justify-content-center">
                              
                                    {{-- <div class="row">
                                        <div class="col-12 m-0 p-0 text-center" style="color: #FFC000; line-height: 1; font-size: 0.7rem;">
                                            MENÚ</div>
                                        <div class="col-12 m-0 p-0">
                                            <button class="btn btn-menu border-0 bg-transparent w-100" onclick="activarModal()">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="fs-1" id="menu-icono"  width="48" height="48" fill="#FFC000" class="bi bi-list" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="col-xxl-9 col-xl-9 col-lg-11">
                                    <div class="row">
                                        <div class="col-6 mt-2 mx-auto">
                                            <div class="row">
                                                
                                                <div class="col-12 position-relative mt-xxl-3 mt-xl-3 mt-lg-3 mt-md-4 p-0">
                                                    <button class="btn btn-menu border-0 bg-transparent w-100" onclick="activarModal()">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="fs-1" id="menu-icono"  width="48" height="48" fill="#FFC000" class="bi bi-list" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                                                        </svg>
                                                    </button>
                                                    <div class="col-12 mt-1 position-absolute top-0 start-50 translate-middle text-center" style="color: #FFC000; line-height: 1; font-size: 0.7rem;">
                                                        MENÚ
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-3 d-xxl-block d-xl-block d-lg-block d-md-none d-sm-none d-none mx-auto mt-3">
                                            <div class="row">
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 text-center mx-auto icono" style="background-color: #FFC000;">
                                                    <a href="http://wa.me/{{ $config->whatsapp }}" class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="black" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 text-center mx-auto icono">
                                                    <a href="{{ $config->facebook }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="black" class="bi bi-facebook" viewBox="0 0 16 16">
                                                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 text-center mx-auto icono">
                                                    <a href="{{ $config->instagram }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="black" class="bi bi-instagra" viewBox="0 0 16 16">
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
                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 menu-modal position-absolute top-50 end-0 translate-middle-y rounded-pill" style="height: 100%; z-index: 3;">
                        <div class="row">
                            <div class="col mt-2 mt-3 menu-sub shadow-lg text-white" style="line-height: 1.2;">
                                <div class="row">
                                    <div class="col-11 mt-3 mx-auto text-end">
                                        <button class="btn mt-3 btn-outline text-white" onclick="cerrarModal()">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10 m-0 p-0 fs-1 fw-bolder mx-auto">
                                        <a href="{{ route('front.index') }}" style="font-family: 'Sansation Bold', sans-serif;" class="texto-hover">Inicio</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10 texto-hover m-0 p-0 fs-1 fw-bolder mx-auto">
                                        <a href="#/" id="toggleServicios" style="font-family: 'Sansation Bold', sans-serif;" class="texto-hover">Servicios</a>
                                    </div>   
                                    <div id="serviciosContent" style="display: none;">
                                        @foreach ($servicios as $serv_head)
                                            <div class="col-10 subtitulo m-0 p-0 fs-4 texto-hover mx-auto">
                                                <a href="{{ route('front.servicio', ['id' => $serv_head->id]) }}" style="font-family: 'Sansation Bold', sans-serif;" class="texto-hover">
                                                    {{ $serv_head->titulo }}
                                                </a>
                                            </div> 
                                        @endforeach    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10 texto-hover m-0 p-0 fs-1 fw-bolder mx-auto">
                                        <a href="{{ route('front.aboutus') }}" style="font-family: 'Sansation Bold', sans-serif;" class="texto-hover">Nosotros</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10 texto-hover m-0 p-0 fs-1 fw-bolder mx-auto">
                                        <a href="{{ route('front.vacantes') }}" style="font-family: 'Sansation Bold', sans-serif;" class="texto-hover">Bolsa de Trabajo</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10 texto-hover m-0 p-0 fs-1 fw-bolder mx-auto">
                                        <a href="{{ route('front.contact') }}" style="font-family: 'Sansation Bold', sans-serif;" class="texto-hover">Contacto</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10 texto-hover m-0 p-0 fs-1 fw-bolder mx-auto">
                                        <a href="{{ route('front.blog') }}" style="font-family: 'Sansation Bold', sans-serif;" class="texto-hover">Blog</a>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 m-0 p-0 pb-4 pt-2 fs-1 fw-bolder mx-auto border-top border-white">
                                        <div class="row">
                                            <div class="d-xxl-none d-xl-none d-lg-none d-md-none d-sm-block d-block d-sm-4 d-4 mx-auto position-relative">
                                                <div class="row">
                                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-9 col-12 mx-auto mt-4 text-center">
                                                        <a href="{{ route('front.contact') }}" class="btn btn-outline py-3 fs-5 fw-bolder rounded-pill w-100 text-white" style="background-color: #FE6E62; font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif; font-weight: bold;">
                                                            COTIZAR AQUÍ <svg xmlns="http://www.w3.org/2000/svg" height="1.4rem" width="3rem" fill="#000000" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xxl-7 col-xl-7 col-lg-9 col-md-12 py-4 fs-4 fw-light text-white" style="font-family: 'Sansation Bold', sans-serif; font-weight: bold;">
                                                TEL. {{ $config->telefono }}
                                            </div>
                                            <div class="col-xxl-5 col-xl-7 col-lg-7 col-md-7 col-sm-9 col-9 py-3">
                                                <div class="row">
                                                    <div class="col-xxl-4 col-xl-4 col-lg-3 col-md-4 col-sm-3 col-3 mx-xxl-0 mx-xl-0 mx-lg-auto mx-md-auto mx-sm-0 mx-0">
                                                        <div class="row">
                                                            <a href="http://wa.me/{{ $config->whatsapp }}" class="col-10 co-ci mx-auto d-flex align-items-center justify-content-center border border-white text-center bg-white rounded-circle ">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="black" class="bi bi-whatsapp icono-contact" viewBox="0 0 16 16">
                                                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-4 col-xl-4 col-lg-3 col-md-4 col-sm-3 col-3 mx-xxl-0 mx-xl-0 mx-lg-auto mx-md-auto mx-sm-0 mx-0">
                                                        <div class="row">
                                                            <a href="{{ $config->facebook }}" class="col-10 co-ci mx-auto d-flex align-items-center justify-content-center border border-white text-center bg-white rounded-circle">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="black" class="bi bi-facebook icono-contact" viewBox="0 0 16 16">
                                                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-4 col-xl-4 col-lg-3 col-md-4 col-sm-3 col-3 mx-xxl-0 mx-xl-0 mx-lg-auto mx-md-auto mx-sm-0 mx-0">
                                                        <div class="row">
                                                            <a href="{{ $config->instagram }}" class="col-10 co-ci mx-auto d-flex align-items-center justify-content-center border border-white text-center bg-white rounded-circle">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="black" class="bi bi-instagra icono-contact" viewBox="0 0 16 16">
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
                    </div>
                </div>
            </div>
        </div>
    </header>
    


