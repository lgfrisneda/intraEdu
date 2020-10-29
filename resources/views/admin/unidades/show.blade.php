@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ url('/cursos/'.$unidad->course_id) }}"><i class="fas fa-arrow-left"></i></a>
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold">{{ $unidad->name }}
                        <div class="float-right">
                            <a href="{{ url('/unidades/'.$unidad->id.'/edit') }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                            <form method="post" action="{{ url('/unidades/'.$unidad->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Seguro que desea borrar la unidad {{ $unidad->name }} del curso {{ $unidad->course_id }}?');"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </h4>
                </div>
                <div class="card-body">
                    <small class="text-muted">
                        <cite title="Source Title">Curso: {{ $unidad->course_id }}</cite>
                    </small>
                    <p class="card-text">{!! $unidad->description !!}</p>
                    <hr>
                    <h5 class="card-title font-weight-bold text-center mb-4">
                        Material
                        <a href="{{ url('/soportes/create/'.$unidad->id) }}" class="btn btn-sm btn-success float-right"><i class="fas fa-plus"></i></a>
                    </h5>
                    <div class="row row-cols-1 row-cols-md-4">
                        <div class="col-md-3 col-sm-6">
                            <div href="#" class="card h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-film fa-5x mb-3"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div href="#" class="card h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-file-alt fa-5x mb-3"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div href="#" class="card h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-file-pdf fa-5x mb-3"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div href="#" class="card h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-images fa-5x mb-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group mb-2">
                        @foreach ($soportes as $soporte)
                        <a href="{{ url('/soportes/'.$soporte->id) }}" class="list-group-item list-group-item-action">
                            {{ $loop->iteration }}. {{ $soporte->name }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection