@extends('layouts.admin')

@section('title', 'Nosotros')

@section('cssExtras')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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
            NOSOTROS
        </div>
    </div>
</div>

@endsection
