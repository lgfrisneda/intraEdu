@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ url('/admin/cursos') }}"><i class="fas fa-arrow-left"></i></a>
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold">{{ $curso->name }}
                        <div class="float-right">
                            <a href="{{ url('admin/cursos/'.$curso->id.'/edit') }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                            <form method="post" action="{{ url('admin/cursos/'.$curso->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Seguro que desea borrar el curso {{ $curso->name }}?');"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <small class="text-muted">
                                <cite title="Source Title">Nivel: {{ $curso->level }}</cite>
                            </small>
                            <p class="card-text">{!! $curso->description !!}</p>
                            <hr>
                            <h5 class="card-title font-weight-bold">Temario</h5>
                            <p class="card-text">{!! $curso->syllabus !!}</p>
                        </div>
                        <div class="col-sm-4">
                            <h5 class="card-title font-weight-bold text-center">Unidades</h5>
                            <div class="list-group mb-2">
                                <a href="#" class="list-group-item list-group-item-action">
                                    #. Titulo de unidad
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    #. Titulo de unidad
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    #. Titulo de unidad
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    #. Titulo de unidad
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    #. Titulo de unidad
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    #. Titulo de unidad
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    #. Titulo de unidad
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    #. Titulo de unidad
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    #. Titulo de unidad
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    #. Titulo de unidad
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    #. Titulo de unidad
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection