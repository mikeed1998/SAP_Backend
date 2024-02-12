@extends('layouts.front')

@section('title', 'FAQS')
{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}


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
	<section>
		<div class="bg-global">
			<div class="col-12 p-4" style="background-color: black; color: white;">
				<div class="text-center text-white fs-1" style="font-family: 'Sansation Bold';">Preguntas Frecuentes</div>
			</div>
		</div>
	</section>

	<div class="container mt-5 mb-5">
		<div class="row">
			<div class="col">
				<div class="accordion" id="accordionExample">
					@foreach ($preguntas as $faq)
						<div class="accordion-item bg-dark border border-warning">
							<h2 class="accordion-header border border-warning" id="heading-{{ $faq->id }}">
								<button class="accordion-button text-uppercase fw-bolder text-center fs-3 bg-black  text-white" style="font-family: 'Sansation Bold';" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $faq->id }}" aria-expanded="true" aria-controls="collapse-{{ $faq->id }}">
									{{ $faq->pregunta }}
								</button>
							</h2>
							<div id="collapse-{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $faq->id }}" data-bs-parent="#accordionExample">
								<div class="accordion-body bg-dark fs-5 text-white" style="font-family: 'Blinker', sans-serif; font-family: 'Montserrat', sans-serif;">
									{!! $faq->respuesta !!}
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	{{-- <div class="container my-4 p-5" style="min-height:55vh">
	
		<div class="col-8 mx-auto">
			<div class="accordion" id="accordionExample">
				@foreach ($preguntas as $faq)

				@php
					if ($loop->first) {
						$expfirst = "show";
					}else{
						$expfirst = "";
					}
				@endphp
	
				<div class="card">
					<div class="card-header" id="headingOne" style="background-color:#000;">
					<h2 class="mb-0" >
						<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{!!  $faq->id  !!}" aria-expanded="" aria-controls="collapseOne" style="color:#fff">
						{{ $faq->pregunta }}
						</button>
					</h2>
					</div>

					<div id="collapse{!!  $faq->id  !!}" class="collapse {{$expfirst}}" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body">
							{!! $faq->respuesta !!}
						</div>
					</div>
				</div>
					
				@endforeach
			</div>
		</div>
	</div> --}}
</section>				

@endsection
@section('jsLibExtras2')
@endsection
@section('jqueryExtra')
<script type="text/javascript">
</script>
@endsection
