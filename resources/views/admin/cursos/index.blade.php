@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">
                    Cursos
                    @can('cursos.create')
                        <a href="{{ url('/cursos/create') }}" class="btn btn-sm btn-success float-right"><i class="fas fa-plus"></i></a>
                    @endcan
                </div>

                <div class="card-body">
                    <form class="form-group" method="get" action="{{ url('/cursos') }}">
                        <div class="input-group is-invalid">
                            <div class="custom-file">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre de curso">
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit">Buscar</button>
                            </div>
                        </div>
                    </form>
                    <div class="row row-cols-1 row-cols-md-3">
                        @foreach($cursos as $curso)
                        <div class="col mb-4">
                            <div class="card h-100">
                                <img src="https://cdn.pixabay.com/photo/2016/11/19/14/00/code-1839406_960_720.jpg" class="card-img-top" alt="{{ $curso->slug }}">
                                <a href="{{ url('/cursos/'.$curso->id) }}" class="card-body">
                                    <h5 class="card-title">{{ $curso->name }}</h5>
                                </a>
                                <div class="card-footer bg-{{ $curso->level->bg_color }} text-center">
                                    <small class="text-black font-weight-bold">{{ $curso->level->name }}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{ $cursos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection