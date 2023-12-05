@extends('layouts.admin')

@section('title', 'Contacto')

@section('cssExtras')

@endsection

@section('styleExtras')

@endsection

@section('content')
<div class="row mb-4 px-2">
    <a href="{{ route('config.seccion.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto rounded-pill"><i class="fa fa-reply"></i> Regresar</a>
</div>
<div class="container">
    <div class="row">
        <div class="col text-center fs-1">
            CONTACTO
        </div>
    </div>
</div>
@endsection

@section('jqueryExtra')

@endsection
