
    
	<style>

			</style>

<div id="" class="side-nav fixed p-3 pt-3" style=" background: none; box-shadow: none;">
	<div class="mt-5" style="background: black; border-radius: 16px; height: 95%; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.291);">
		<ul class="custom-scrollbar" style="">
			<li class="logo-sn waves-effect py-3">
				<div class="text-center">
					<a href="{{ url('admin') }}" class="pl-0">
						<img class="img-fluid h-100" src="{{asset('img/design/logo_woz.png')}}">
					</a>
				</div>
			</li>
					<li>
						<ul class="collapsible collapsible-accordion">
						</ul>
						<li>
						<ul class="collapsible collapsible-accordion">
							{{-- <li>
								<a href="{{ route('pedidos.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/pedidos')) ? 'active' : '' }}"><i class="fas fa-box-open"></i>Pedidos</a>
							</li> --}}
							{{-- <li class="p-2">
								<a href="{{ route('config.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/config')) ? 'active' : '' }}" style="border-radius: 16px; text-decoration: none; "><i class="w-fa fas fa-cog"></i>Inicio config</a>
							</li> --}}
							<li class="p-2">
								<a href="{{ route('admin.home') }}" class="collapsible-header waves-effect {{ (request()->is('admin')) ? 'active' : '' }}" style="border-radius: 16px; text-decoration: none; "><i class="w-fa fas fa-cog"></i>Inicio config</a>
							</li>
							<li class="p-2">
								<a href="{{ route('config.faq.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/config/faq')) ? 'active' : '' }}" style="border-radius: 16px; text-decoration: none; "><i class="fas fa-question"></i>FAQ</a>
							</li>
							<li class="p-2">
								<a href="{{ route('config.politica.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/config/faq')) ? 'active' : '' }}" style="border-radius: 16px; text-decoration: none; "><i class="fas fa-shield-alt"></i>Políticas</a>
							</li>
							<li class="p-2">
								<a href="{{ route('config.seccion.show', ['slug' => 'index']) }}" class="collapsible-header waves-effect {{ (request()->is('admin/config/secciones/index')) ? 'active' : '' }}" style="border-radius: 16px; text-decoration: none; "><i class="fas fa-home-lg-alt"></i> Inicio</a>
							</li>
							<li class="p-2">
								<a  href="{{ route('config.seccion.show', ['slug' => 'services']) }}" class="collapsible-header waves-effect {{ (request()->is('admin/config/secciones/services')) ? 'active' : '' }}" style="border-radius: 16px; text-decoration: none; "><i class="fa-solid fa-check"></i> Servicios</a>
							</li>
							<li class="p-2">
								<a  href="{{ route('config.seccion.show', ['slug' => 'proyects']) }}" class="collapsible-header waves-effect {{ (request()->is('admin/config/secciones/proyects')) ? 'active' : '' }}" style="border-radius: 16px; text-decoration: none; "><i class="fas fa-shield"></i> Proyectos</a>
							</li>
							<li class="p-2">
								<a href="{{ route('config.seccion.show', ['slug' => 'vacants']) }}" class="collapsible-header waves-effect {{ (request()->is('admin/config/secciones/vacants')) ? 'active' : '' }}" style="border-radius: 16px; text-decoration: none; "><i class="fa-solid fa-business-time"></i> Vacantes</a>
							</li>
							<li class="p-2">
								<a  href="{{ route('config.seccion.show', ['slug' => 'aboutus']) }}" class="collapsible-header waves-effect {{ (request()->is('admin/config/secciones/aboutus')) ? 'active' : '' }}" style="border-radius: 16px; text-decoration: none; "><i class="fa-solid fa-paperclip"></i> Nosotros</a>
							</li>
							<li class="p-2">
								<a  href="{{ route('config.seccion.show', ['slug' => 'contact']) }}" class="collapsible-header waves-effect {{ (request()->is('admin/config/secciones/contact')) ? 'active' : '' }}" style="border-radius: 16px; text-decoration: none; "><i class="fa-solid fa-envelope"></i> Contacto</a>
							</li>

							{{-- <li class="p-2">
								<a href="{{ route('clientes.show')}}" style="border-radius: 16px; text-decoration: none; " ><i class="fa-solid fa-users me-3"></i>Clientes</a>
							</li> --}}
							{{-- <li class="p-2">
								<a href="{{ route('productos.show')}}" class="collapsible-header waves-effect" style="border-radius: 16px; text-decoration: none; " ><i class="fa-solid fa-list-check me-3"></i>Productos</a>
							</li>
							<li class="p-2">
								<a href="{{ route('pedidios.show')}}" class="collapsible-header waves-effect " style="border-radius: 16px; text-decoration: none; " ><i class="fa-solid fa-dolly  me-3"></i>Pedidos</a>
							</li> --}}
							{{-- <li class="p-2">
								<a href="{{ route('clientes.index') }}" class="collapsible-header waves-effect"><i class="fas fa-users"></i></i>Clientes</a>
							</li> --}}
							{{-- <li class="p-2"> --}}
								{{-- <a href="{{ url('admin/config/') }}" class="collapsible-header waves-effect {{ (request()->is('admin/config')) ? 'active' : '' }}" style="border-radius: 16px; text-decoration: none; "><i class="w-fa fas fa-cog"></i>Configuración</a> --}}
								{{-- <a href="{{ route('vacante.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/vacantes')) ? 'active' : '' }}" style="border-radius: 16px; text-decoration: none; "><i class="w-fa fas fa-search"></i>Vacantes</a>
							</li> --}}
							<li class="p-2">
								{{-- <a href="{{ url('admin/config/') }}" class="collapsible-header waves-effect {{ (request()->is('admin/config')) ? 'active' : '' }}" style="border-radius: 16px; text-decoration: none; "><i class="w-fa fas fa-cog"></i>Configuración</a> --}}
								{{-- <a href="{{ route('config.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/config')) ? 'active' : '' }}" style="border-radius: 16px; text-decoration: none; "><i class="w-fa fas fa-cog"></i>Configuración</a> --}}
							</li>
						</ul>
					</li>
					</li>
				</ul>
	</div>


	


</div>
