@extends('layouts.admin')
@section('cssExtras')

@endsection
@section('jsLibExtras')

@endsection
@section('styleExtras')

@endsection
@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

    <div class="container-fluid text-white">
        <div class="row">
            <div class="col text-center">
               <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Crear nuevo post
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col display-1">
                Entradas
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Blog - Nuevo post</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="titulo" class="fs-5">Titulo del post</label>
                                    <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Titulo">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="descripcion" class="fs-5">Breve descripción del tema</label>
                                    <textarea name="descripcion" class="form-control" id="" cols="30" rows="6" placeholder="Breve descripción del tema (no mayor a 100 caracteres)"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <label for="descripcion" class="fs-5">Portada del post</label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="col-12">
                                    <small>Se mostrará en la página principal del blog</small>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Crear entrada</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('jsLibExtras2')

@endsection
@section('jqueryExtra')

@endsection
