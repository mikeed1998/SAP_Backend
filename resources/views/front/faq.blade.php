@extends('layouts.front')

@section('title', 'FAQS')
{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}

@section('styleExtras')
    <style>
        @font-face {
            font-family: 'Sansation Bold';
            src: url("{{ asset('fonts/Sansation-Bold/Sansation_Bold.ttf') }}") format('truetype');
            font-weight: normal;
            font-style: normal;
        }
    </style>
@endsection

@section('content')
<section>
	<section>
		<div class="bg-global">
			<div class="col-12 p-4 text-center" style="background-color: black; color: white;">
				<div class="d-inline fs-1" style="font-size:24px;color: white; font-family: 'Sansation Bold';">Preguntas Frecuentes</div>
			</div>
		</div>
	</section>

	<div class="container my-4 p-5" style="min-height:55vh">
	
		<div class="col-8 mx-auto">
			<div class="accordion" id="accordionExample">
				@foreach ($preguntas as $faq)
{{-- 
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
				</div> --}}

				<div class="accordion-item">
					<h2 class="accordion-header">
					  	<button class="accordion-button fs-3 text-uppercase" style="font-family: 'Sansation Bold', sans-serif;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{ $faq->id }}" aria-expanded="true" aria-controls="collapseOne-{{ $faq->id }}">
							{{ $faq->pregunta }}
					  	</button>
					</h2>
					<div id="collapseOne-{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
					  	<div class="accordion-body fs-5" style="font-family: 'Sansation Bold', sans-serif;">
							{!! $faq->respuesta !!}
						</div>
					</div>
				</div>
					
					
				@endforeach
			</div>
		</div>
	</div>
</section>				

@endsection
@section('jsLibExtras2')
@endsection
@section('jqueryExtra')
<script type="text/javascript">
</script>
@endsection
