@extends('layouts.front')

@section('title')
{{-- {{$politica->titulo}} --}}
Aviso de Privacidad
@endsection
{{-- @section('cssExtras')@endsection --}}
{{-- @section('styleExtras')@endsection --}}
@section('content')

<style>
	@font-face {
		font-family: 'Sansation Bold';
		src: url("{{ asset('fonts/Sansation-Bold/Sansation_Bold.ttf') }}") format('truetype');
		font-weight: normal;
		font-style: normal;
	}
</style>

	<section>
		<div class="bg-global">
			<div class="col-12 p-4" style="background-color: black; color: white;">
				<div class="text-center text-white fs-1" style="font-size:24px;color: white; font-family: 'Sansation Bold';"> {{ $politica[3]->titulo }} </div>
			</div>
		</div>
	</section>
	<div class="container"  style="min-height:55vh">
		<div class="my-4 p-5" style="background:url(img/photos/nosotros/bg-contacto.png);/* background-repeat: no-repeat; */background-position: center;">
			<div class="col-12 col-md-8 p-4 mx-auto fw-bolder bg-white" style="border: .5em solid #e6e6e6;">
				{!! $politica[3]->descripcion !!}
			</div>
		</div>
	</div>

	<section>
		<div class="bg-global">
			<div class="col-12 p-4" style="background-color: black; color: white;">
				<div class="text-center text-white fs-1" style="font-size:24px;color: white; font-family: 'Sansation Bold';"> {{ $politica[0]->titulo }} </div>
			</div>
		</div>
	</section>
	<div class="container"  style="min-height:55vh">
		<div class="my-4 p-5" style="background:url(img/photos/nosotros/bg-contacto.png);/* background-repeat: no-repeat; */background-position: center;">
			<div class="col-12 col-md-8 p-4 mx-auto fw-bolder bg-white" style="border: .5em solid #e6e6e6;">
				{!! $politica[0]->descripcion !!}
			</div>
		</div>
	</div>

@endsection

@section('jsLibExtras2')
@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$('iframe').attr('width', '100%');
		$('iframe').attr('height', '460');

		// window.onload = function() {
		//
		// };
		//
		// $(document).ready(function() {
		// });

	</script>
@endsection
