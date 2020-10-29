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
                            <a href="{{ url('/cursos/'.$curso->id) }}" class="card h-100">
                                <!--<img src="..." class="card-img-top" alt="{{ $curso->slug }}">-->
                                <div class="card-body">
                                    <h5 class="card-title">{{ $curso->name }}</h5>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">{{ $curso->level }}</small>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection