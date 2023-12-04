<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<style>

.dropdown-toggle::after {
  display: none;
}
        @media(min-width: 1800px) {
            .menu-grande {
                display: block;
            }

            .menu-movil {
                display: none;
            }

            .boton-xs {
                display: none;
             } 

        }

        /* xxl */
        @media (min-width: 1400px) and (max-width: 1799px) {
            .menu-grande {
                display: block;
            }

            .menu-movil {
                display: none;
            }

            .boton-xs {
                display: none;
            }

        }

        /* xl */
        @media (min-width: 1200px) and (max-width: 1399px) {
            .menu-grande {
                display: block;
            }

            .menu-movil {
                display: none;
            }

            .boton-xs {
                display: none;
            }

        }

        /* lg */
        @media (min-width: 992px) and (max-width: 1199px) {
            .menu-grande {
                display: none;
            }

            .menu-movil {
                display: block;
            }

            .boton-xs {
                display: none;
            }

        }

        /* md */
        @media (min-width: 768px) and (max-width: 991px) {
            .menu-grande {
                display: none;
            }

            .menu-movil {
                display: block;
            }

            .boton-xs {
                display: none;
            }

        }

        /* sm */
        @media (min-width: 576px) and (max-width: 767px) {
            .menu-grande {
                display: none;
            }

            .menu-movil {
                display: block;
            }

            .boton-xs {
                display: none;
            }

        }

        /* xs */
        @media (min-width: 0px) and (max-width: 575px) {
            .menu-grande {
                display: none;
            }

            .menu-movil {
                display: block;
            }

            .boton-md {
                display: none;
            }

            .boton-xs {
                display: block;
            }
    
        }
        
    </style>

        @if ($pagina == 'tienda')
            <header class="menu-grande py-3" style="background-color: #E7E7E7;">
        @elseif ($pagina == 'home' || $pagina == 'subdistribuidor' || $pagina == 'contacto' || $pagina == 'nosotros')
            <header class="menu-grande pt-3" style="background-color: #E7E7E7;">
        @else
            <header class="menu-grande py-3" style="background-color: white;">
        @endif
            <div class="row mt-0">
                <div class="col-2 fs-5 mt-xxl-0 mt-xl-4 mt-lg-0 text-center ps-5 pe-3">
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('img/design/home/logo.png') }}" class="img-fluid"/>
                        </div>
                    </div>
                </div>
                <div class="col-10 bg-white mt-4 shadow" style="border-top-left-radius: 36px; border-bottom-left-radius: 36px;">
                    <div class="row">
                        <div class="col header-btn d-flex align-content-center justify-content-center h6 m-0 fw-bolder text-center">
                            <a href="{{ route('front.index') }}" class="py-4" style="text-decoration: none;">
                                Inicio
                            </a>
                        </div>
                        <div class="col header-btn d-flex align-content-center justify-content-center h6 m-0 fw-bolder text-center">
                            <a href="{{ route('front.tienda') }}" class="py-4" style="text-decoration: none;">
                                Tienda
                            </a>
                        </div>
                        <div class="col header-btn d-flex align-content-center justify-content-center h6 m-0 fw-bolder text-center">
                            <a href="{{ route('front.soluciones') }}" class="py-4" style="text-decoration: none;">
                                Soluciones
                            </a>
                        </div>
                        <div class="col-2 header-btn d-flex align-content-center justify-content-center h6 m-0 fw-bolder text-center">
                            <a href="{{ route('front.punto_venta') }}" class="py-4" style="text-decoration: none;">
                                Punto de venta
                            </a>
                        </div>
                        <div class="col header-btn d-flex align-content-center justify-content-center h6 m-0 fw-bolder text-center">
                            <a href="{{ route('front.subdistribuidor') }}" class="py-4" style="text-decoration: none;">
                                Subdistribuidor
                            </a>
                        </div>
                        <div class="col header-btn d-flex align-content-center justify-content-center h6 m-0 fw-bolder text-center">
                            <a href="{{ route('front.aboutus') }}" class="py-4" style="text-decoration: none;">
                                Nosotros
                            </a>
                        </div>
                        <div class="col header-btn d-flex align-content-center justify-content-center h6 m-0 fw-bolder text-center">
                            <a href="{{ route('front.contact') }}" class="py-4" style="text-decoration: none;">
                                Contacto
                            </a>
                        </div>
                        <div class="col bg-white h6 m-0 fw-normal d-flex align-content-center justify-content-center text-success text-center">
                            {{-- <a href="{{url('login')}}" style="color: #E30920;"><i class="fa-solid mt-4 fa-user me-3 icon-use" style="font-size: 20px;"></i></a> --}}
                            <a class="navbar-brand mt-1" href="{{ url('login') }}" style="color: #E30920; font-size: 14px; font-weight: 700;">
                                <i class="fa-solid mt-3 fa-user me-3 icon-use" style="font-size: 20px; color: #E30920;"></i>
                                @if(auth()->check())
                                    {{ auth()->user()->name }}
                                @else
                                    Usuario
                                @endif
                            </a>
                        </div>
                        <div class="col bg-white py-3 d-flex align-content-center justify-content-center fs-5 fw-normal text-success text-center">
                            <a href="{{url('miCarrito')}}">
                            <div class="row">
                                <div class="col position-relative">
                                    <img src="{{ asset('img/design/header/carrito.png') }}" alt="" class="img-fluid text-start">
                                    <div class="col position-absolute top-0 end-0 translate-middle bg-white text-danger rounded-circle">
                                        @if(session('carrito'))
                                        {{-- <i class="fa-solid fa-circle" style="position: absolute; top: -10px; left: 20px; color: red; font-size: 12px;"></i> --}}
                                          @php
                                              $cuenta = count(session('carrito'));
                                          @endphp
                                          @if($cuenta > 9)
                                          9+
                                          {{-- <p style="position: absolute; top: -2px; left: 8px; color: white; font-size: 11px;">9+</p> --}}
                                          @else
                                          {{ $cuenta }}
                                            {{-- <p style="position: absolute; top: -1px; left: 11px; color: white; font-size: 11px;">{{$cuenta}}</p> --}}
                                          @endif
                                        @endif
                                    </div>
                                        
                                        
                                      
                                </div>
                            </div>
                            </a>
                            
                        </div>
                    </div>
                </div>    
            </div>
        </header>   

        <header class="menu-movil">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-12 fs-3 text-center">
                    <div class="boton-md">
                        <img src="{{ asset('img/design/home/logo.png') }}" class="img-fluid"/>
                    </div>
                    <div class="boton-xs">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-12 text-center">
                    <!-- Botón para colapsar/mostrar las columnas -->
                    <div class="boton-md">
                        <button class="btn btn-outline border-dark mt-md-4 mt-sm-4 mt-xs-4 mt-0" data-bs-toggle="collapse" data-bs-target="#miColapso"><span uk-icon="icon: menu; ratio: 2;"></span></button>
                    </div>
                    <div class="boton-xs">
                        <button class="btn-link btn-outline border-0 mt-md-4 mt-sm-4 mt-xs-4 mt-0 py-3" data-bs-toggle="collapse" data-bs-target="#miColapso" style="text-decoration: none;"><img src="{{ asset('img/design/home/logo.png') }}" class="img-fluid w-100"/></button>
                    </div>
                    <!-- <button class="btn-link w-100 btn-outline border-0 bg-white m-0 btn-p-0" data-bs-toggle="collapse" data-bs-target="#miColapso"><img src="img/logo.png" class="img-fluid" style=""/></button> -->
                </div>
                <div class="col-12">
                    <!-- Elemento colapsable que contiene las columnas -->
                    <div id="miColapso" class="collapse">
                        <div class="row mt-2 mb-2">
                            <div class="col-md-3 col-sm-2 col-xs-2 col-2"></div>
                            <div class="col-md-9 col-sm-10 col-xs-10 col-10 bg-white" style="border-top-left-radius: 36px; border-bottom-left-radius: 36px;">
                                <div class="row">
                                <div class="col-12 header-btn_movil fs-3 fw-bolder py-3 text-center">
                                <a href="{{ route('front.index') }}" style="text-decoration: none;">
                                    Inicio
                                </a>
                            </div>
                            <div class="col-12 header-btn_movil fs-3 fw-bolder py-3 text-center">
                                <a href="{{ route('front.tienda') }}" style="text-decoration: none;">
                                    Tienda
                                </a>
                            </div>
                            <div class="col-12 header-btn_movil fs-3 fw-bolder py-3 text-center">
                                <a href="{{ route('front.soluciones') }}" style="text-decoration: none;">
                                    Soluciones
                                </a>
                            </div>
                            <div class="col-12 header-btn_movil fs-3 fw-bolder py-3 text-center">
                                <a href="{{ route('front.punto_venta') }}" style="text-decoration: none;">
                                    Punto de venta
                                </a>
                            </div>
                            <div class="col-12 header-btn_movil fs-3 fw-bolder py-3 text-center">
                                <a href="{{ route('front.subdistribuidor') }}" style="text-decoration: none;">
                                    Subdistribuidor
                                </a>
                            </div>
                            <div class="col-12 header-btn_movil fs-3 fw-bolder py-3 text-center">
                                <a href="{{ route('front.aboutus') }}" style="text-decoration: none;">
                                    Nosotros
                                </a>
                            </div>
                            <div class="col-12 header-btn_movil fs-3 fw-bolder py-3 text-center">
                                <a href="{{ route('front.contact') }}" style="text-decoration: none;">
                                    Contacto
                                </a>
                            </div>
                            <div class="col fs-5 fw-normal py-3 text-success text-end">
                                <!-- <a href="index.php" style="text-decoration: none; color: #E30920;">
                                    <img src="img/header/usuario.png" alt="" class="img-fluid">Cuenta 
                                </a> -->
                                <div class="dropdown">
                                    <button class="btn border-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="box-shadow: none;">
                                        <div class="row">
                                            <div class="col text-center " style="color: #E30920;">
                                                <img src="{{ asset('img/design/header/usuario.png') }}" alt="" class="img-fluid">Cuenta
                                            </div>
                                        </div>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item fs-5" href="login.php" style="color: #E30920;">Ingresar</a></li>
                                        <li><a class="dropdown-item fs-5" href="register.php" style="color: #E30920;">Resgistrarse</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col fs-5 fw-normal py-3 text-success text-center">
                                <a href="{{url('miCarrito')}}" style="position: relative;">
                                    <img src="{{ asset('img/design/header/carrito.png') }}" alt="" class="img-fluid">
                                    @if(session('carrito'))
                                    <i class="fa-solid fa-circle" style="position: absolute; top: -10px; left: 20px; color: red; font-size: 12px;"></i>
                                      @php
                                          $cuenta = count(session('carrito'));
                                      @endphp
                                      @if($cuenta > 9)
                                      <p style="position: absolute; top: -2px; left: 8px; color: white; font-size: 11px;">9+</p>
                                      @else
                                        <p style="position: absolute; top: -1px; left: 11px; color: white; font-size: 11px;">{{$cuenta}}</p>
                                      @endif
                                    @endif
                                  </a>
                                {{-- <a href="carrito.php" style="text-decoration: none; color: #00AD61;">
                                    <img src="{{ asset('img/design/header/carrito.png') }}" alt="" class="img-fluid">
                                </a> --}}
                            </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </header>  




{{-- <!-- Menu de la cabecera -->
<style>

    .icon_menu{
      display: none;
    }
    .icon-use{
      display: none;
    }

  @media only screen and (max-width: 780px){  
    .div_menu{
      display: none !important;
    }
    .icon_redes{
    
      font-size: 15px;
  }
  .icon_menu{
      display: block;
    }
  }  
  @media only screen and (max-width: 490px){  
  .icon_redes{
    display: none;
  }
    .div_menu_movil{
      display: block !important;
    }
    .icon-use{
      display: block;
    }
  }
</style>


<div class="menu_completo col-12 py-3 d-flex align-items-center" style="background: ; position: ; top:0; z-index: 1000;">
  <div class="col-12 px-3 px-lg-5 d-flex justify-content-between justify-content-md-between align-items-center">

      <div class="col-8 col-md-3 col-lg-auto row d-flex justify-content-start align-items-center" style="background:;">
        <img src="{{asset('img/design/logo.png')}}" style="width: 100%; max-width: 150px;" alt="">
      </div>

    <div class="div_menu col-12 col-md-9 col-lg-6 d-flex justify-content-md-end justify-content-lg-center align-items-center" style="background:  ;">
      <a href="{{route('front.index')}}" class="col-auto mx-4 my-auto text-center" style="text-decoration: none; color: black; font-size: 13px; font-weight: bold;">Home</a>
      <a href="{{route('front.products')}}" class="col-auto mx-4 my-auto text-center" style="text-decoration: none; color: black; font-size: 13px; font-weight: bold;">Store</a>
      <a href="{{route('front.projects')}}" class="col-auto mx-4 my-auto text-center" style="text-decoration: none; color: black; font-size: 13px; font-weight: bold;">Proyectos</a>
      <a href="{{route('front.contact')}}" class="col-auto mx-4 my-auto text-center" style="text-decoration: none; color: black; font-size: 13px; font-weight: bold;">Contacto</a>
      <div class="col-auto ms-5 d-flex justify-content-center align-items-center flex-row">
        <a href="https://api.whatsapp.com/send?phone={{$config->whatsapp}}&text=Hola,%20estoy%20interesado%20en%20obtener%20m%C3%A1s%20informaci%C3%B3n"><i class="my-auto p-1 text-center fa-brands fa-whatsapp icon_redes" style="font-size: 1.8rem; background: ; border:1px solid #a99091; width: 40px; border-radius: 50%; color: #a99091;"></i></a>
        <a href="{{$config->facebook}}"><i class="my-auto p-1 text-center fa-brands fa-facebook-f mx-3 mx-md-3 mx-lg-4 icon_redes" style="font-size: 1.8rem; background: ; border:1px solid #a99091; width: 40px; border-radius: 50%; color: #a99091;"></i></a>
        <a href="{{$config->instagram}}"><i class="my-auto p-1 text-center fa-brands fa-instagram icon_redes" style="font-size: 1.8rem; background: ; border:1px solid #a99091; width: 40px; border-radius: 50%; color: #a99091;"></i></a>
        <a href=""><i class="my-auto p-1 text-center fab fa-tiktok icon_redes mx-3 mx-md-3 mx-lg-4" style="font-size: 1.8rem; background: ; border:1px solid #a99091; width: 40px; border-radius: 50%; color: #a99091;"></i></a>
      </div>
    </div>


    <div class="col-auto d-flex justify-content-between align-items-center flex-row" style="background: ; color: rgb(0, 0, 0); font-size: 15px;">
      <a href="{{url('login')}}" class="me-3 my-auto icon_redes" style="text-decoration: none; color: black;">@if(isset($user)) {{$user->name." ".$user->lastname }} @else Iniciar sesion @endif</a>
      <a href="{{url('login')}}" style="color: black;"><i class="fa-solid fa-user me-3 icon-use" style="font-size: 20px;"></i></a>
      <a href="{{url('miCarrito')}}" style="position: relative;">
        <i class="fas fa-shopping-cart me-0 me-md-4"  style="font-size: 22px; color: black;"></i>
        @if(session('carrito'))
        <i class="fa-solid fa-circle" style="position: absolute; top: -10px; left: 20px; color: red; font-size: 12px;"></i>
          @php
              $cuenta = count(session('carrito'));
          @endphp
          @if($cuenta > 9)
          <p style="position: absolute; top: -2px; left: 8px; color: white; font-size: 11px;">9+</p>
          @else
            <p style="position: absolute; top: -1px; left: 11px; color: white; font-size: 11px;">{{$cuenta}}</p>
          @endif
        @endif
      </a>
      
      <i onclick="toggleDiv()" class="fa-solid fa-bars ms-4 icon_menu" style="color: black; font-size: 30px;"></i>
    </div>



  </div>


</div>
<div id="miDiv" class=" col-12 mt-0" style="height: 0px; overflow: hidden; background: white;">
  <div class="container d-flex flex-column mt-3">
    <div class="col-12" style="">

    </div>
    <a href="{{route('front.index')}}" class="col-12 ps-5 d-flex align-items-center" style="color: black; text-decoration: none;"><img src="{{asset('img/assets/icono_menú.png')}}" alt=""><p class="my-auto mx-2">Home</p></a>
    <hr style="color: white;">
    <a href="{{route('front.products')}}" class="col-12 ps-5 d-flex align-items-center" style="color: black; text-decoration: none;"><img src="{{asset('img/assets/icono_menú.png')}}" alt=""><p class="my-auto mx-2">Store</p></a>
    <hr style="color: white;">
    <a href="{{route('front.projects')}}" class="col-12 ps-5 d-flex align-items-center" style="color: black; text-decoration: none;"><img src="{{asset('img/assets/icono_menú.png')}}" alt=""><p class="my-auto mx-2">Proyectos</p></a>
    <hr style="color: white;">
    <a href="{{route('front.contact')}}" class="col-12 ps-5 d-flex align-items-center" style="color: black; text-decoration: none;"><img src="{{asset('img/assets/icono_menú.png')}}" alt=""><p class="my-auto mx-2">Contacto</p></a>
    <hr style="color: white;">
  </div>
  <div class="col-auto d-flex justify-content-center align-items-center flex-row mb-3" style="background: ; color: black; font-size: 20px;">
    <a href="https://api.whatsapp.com/send?phone={{$config->whatsapp}}&text=Hola,%20estoy%20interesado%20en%20obtener%20m%C3%A1s%20informaci%C3%B3n"><i class="my-auto fa-brands fa-whatsapp "></i></a>
    <a href="{{$config->facebook}}"><i class="my-auto fa-brands fa-facebook-f mx-3 mx-md-3 mx-lg-5 "></i></a>
    <a href="{{$config->instagram}}"><i class="my-auto fa-brands fa-instagram "></i></a>
  </div>
</div>

<!-- Menu de la cabecera -->
<script>
function toggleDiv() {
  var div = $("#miDiv");
  if (div.height() == 0) {
    div.animate({height: 'auto'}, 500);
  } else {
    div.animate({height: '0px'}, 500);
  }
}

$(window).scroll(function() {
  
  var scroll = $(window).scrollTop();
  
  if (scroll > 0) {
    console.log('mayor');
    $('.menu_completo').addClass('menu-scrolled');
  } else {
    console.log('cero');
    $('.menu_completo').removeClass('menu-scrolled');
  }
});

  $(document).ready(function() {
    // código que se ejecuta cuando el documento esté listo

  });
</script> --}}
