@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ url('/cursos') }}"><i class="fas fa-arrow-left"></i></a>
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold">{{ $curso->name }}
                        <div class="float-right">
                            @can('cursos.edit')
                                <a href="{{ url('/cursos/'.$curso->id.'/edit') }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                            @endcan
                            @can('cursos.destroy')
                                <form method="post" action="{{ url('/cursos/'.$curso->id) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Seguro que desea borrar el curso {{ $curso->name }}?');"><i class="fas fa-trash"></i></button>
                                </form>
                            @endcan
                        </div>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <small class="text-muted">
                                <cite title="Source Title">Nivel: {{ $curso->level->name }}</cite>
                            </small>
                            <p class="card-text">{!! $curso->description !!}</p>
                            <hr>
                            <h5 class="card-title font-weight-bold">Temario</h5>
                            <p class="card-text">{!! $curso->syllabus !!}</p>
                        </div>
                        <div class="col-sm-4">
                            <h5 class="card-title font-weight-bold text-center">
                                Unidades
                                @can('unidades.create')
                                    <a href="{{ url('/unidades/create/'.$curso->id) }}" class="btn btn-sm btn-success float-right"><i class="fas fa-plus"></i></a>
                                @endcan
                            </h5>
                            <div class="list-group mb-2">
                                @foreach ($unidades as $unidad)
                                <a href="{{ url('/unidades/'.$unidad->id) }}" class="list-group-item list-group-item-action">
                                    {{ $loop->iteration }}. {{ $unidad->name }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection