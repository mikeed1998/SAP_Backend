<footer>
    <div class="container-fluid" style="background-color: #005395;">
        <div class="row py-5">
            <div class="col-11 mx-auto">
                <div class="row py-3">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 col-11 mx-auto mt-3 border-end border-dark">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset('img/design/footer/foot.png') }}" alt="" class="img-fluid w-75">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-1"></div>
                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 col-3 text-start rounded-circle">
                                <img src="{{ asset('img/design/footer/icono01.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 col-3 text-start">
                                <img src="{{ asset('img/design/footer/icono02.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 col-3 text-start">
                                <img src="{{ asset('img/design/footer/icono03.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-12 col-sm-12 col-xs-12 col-12"></div>
                    <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12 col-11 mx-auto text-white mt-xxl-1 mt-xl-1 mt-lg-1 mt-md-5 mt-sm-3 mt-xs-3 mt-3">
                        <div class="row">
                            <div class="col-md-4 mt-xxl-0 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-3 mt-xs-3 mt-3 text-start">
                                <div class="row">
                                    <div class="col-12 py-0 mb-3 fs-4 fw-bolder">
                                        NAVEGACIÓN
                                    </div>
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('front.index') }}" style="text-decoration: none; color: #BCBCB0;">Inicio</a>
                                    </div>
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('front.tienda') }}" style="text-decoration: none; color: #BCBCB0;">Tienda</a>
                                    </div>
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('front.soluciones') }}" style="text-decoration: none; color: #BCBCB0;">Soluciones</a>
                                    </div>
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('front.aboutus') }}" style="text-decoration: none; color: #BCBCB0;">Nosotros</a>
                                    </div>
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('config.contact') }}" style="text-decoration: none; color: #BCBCB0;">Contacto</a>
                                    </div>
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('front.subdistribuidor') }}" style="text-decoration: none; color: #BCBCB0;">Subdistribuidor</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-xxl-0 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-3 mt-xs-3 mt-3 text-start">
                                <div class="row">
                                    <div class="col py-0 mb-3 fs-4 fw-bolder">
                                        AYUDA
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('front.faqs') }}" style="text-decoration: none; color: #BCBCB0;">Preguntas Frecuentes</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('front.politicas') }}" style="text-decoration: none; color: #BCBCB0;">Aviso de Privacidad</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('front.metodos_pago') }}" style="text-decoration: none; color: #BCBCB0;">Métodos de Pago</a>
                                    </div>
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('front.punto_venta') }}" style="text-decoration: none; color: #BCBCB0;">Punto de Venta</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-xxl-0 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-3 mt-xs-3 mt-3 mt-3 text-start">
                                <div class="row">
                                    <div class="col py-0 mb-3 fs-4 fw-bolder">
                                        CONTACTO
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        Tel. {{ $config->telefono }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        {{ $config->direccion }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col py-3 text-center" style="background-color: #014076; color: #BCBCB0;">
                P E P E&nbsp;&nbsp;&nbsp;F E S T E R&nbsp;&nbsp;&nbsp;2 0 2 3&nbsp;&nbsp;&nbsp;T O D O S&nbsp;&nbsp;&nbsp;L O S&nbsp;&nbsp;&nbsp;D E R E C H O S&nbsp;&nbsp;&nbsp;R E S E R V A D O S&nbsp;&nbsp;&nbsp;D I S E Ñ O&nbsp;&nbsp;&nbsp;P O R&nbsp;&nbsp;&nbsp;W O Z I A L
            </div>
        </div>
    </div>
</footer>
    