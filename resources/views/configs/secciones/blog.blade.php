@extends('layouts.admin')

@section('cssExtras')

@endsection

@section('jsLibExtras')

@endsection

@section('styleExtras')
    <style>
        .boton {
            background-color: #FAC706;
            font-size: 2rem;
            padding-left: 2rem;
            padding: 1rem;
            border-radius: 1rem;
            margin: 2rem;
        }

        .boton:hover {
            background-color: white;
        }
    </style>
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

    <div class="container">
        <div class="row">
            <div class="col-6 text-center">
                <a href="{{ route('config.blog.index') }}" class="btn w-100 boton">Ir a mis blogs</a>
            </div>
            <div class="col-6 display-3 text-center">
                <a href="{{ route('config.blog.create') }}" class="btn w-100 boton">Crear nuevo blog</a>
            </div>
        </div>
    </div>

@endsection

@section('jsLibExtras2')

@endsection

@section('jqueryExtra')

@endsection
