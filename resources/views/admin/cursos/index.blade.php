@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">
                    Cursos
                    <a href="{{ url('/cursos/create') }}" class="btn btn-sm btn-success float-right"><i class="fas fa-plus"></i></a>
                </div>

                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3">
                        @foreach($cursos as $curso)
                        <div class="col mb-4">
                            <div class="card h-100">
                                <img src="https://cdn.pixabay.com/photo/2016/11/19/14/00/code-1839406_960_720.jpg" class="card-img-top" alt="{{ $curso->slug }}">
                                <a href="{{ url('/cursos/'.$curso->id) }}" class="card-body">
                                    <h5 class="card-title">{{ $curso->name }}</h5>
                                </a>
                                <div class="card-footer bg-{{ $curso->level->bg_color }} text-center">
                                    <small class="text-white font-weight-bold">{{ $curso->level->name }}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection