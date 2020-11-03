@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ url('/cursos/'.$unidad->course_id) }}"><i class="fas fa-arrow-left"></i></a>
                
            <div class="card">
                @if(isset($video))
                <div class="row">
                    <div class="col-sm-8">
                        <video width="100%" controls>
                            <source src="{{ asset('storage/'.$video->file) }}" type="video/mp4">
                            <source src="{{ asset('storage/'.$video->file) }}" type="video/ogg">
                            Your browser does not support HTML5 video.
                        </video>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header text-white bg-dark text-center">
                                Información del video
                            </div>
                            <div class="card-body">
                                <p class="card-text">{!! $video->description !!}</p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-block btn-success">Siguiente unidad</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
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
                        <cite title="Source Title">Curso: {{ $unidad->course->name }}</cite>
                    </small>
                    <p class="card-text">{!! $unidad->description !!}</p>
                    <hr>
                    <h5 class="card-title font-weight-bold text-center mb-4">
                        Material
                        <a href="{{ url('/soportes/'.$unidad->id) }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-list"></i></a>
                    </h5>
                    <h6 class="font-weight-bold">PDF - Power Point - otros</h6>
                    <div class="row mb-4">
                        @foreach($archivos as $archivo)
                        <div class="col-md-3 col-sm-6">
                            <div href="#" class="card h-100">
                                <div class="card-body text-center">
                                        <i class="fas fa-paperclip fa-5x" data-toggle="modal" data-target="#archivoAdjunto{{ $archivo->id }}"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="archivoAdjunto{{ $archivo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Archivo adjunto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h6 class="font-weight-bold">{{ $archivo->name }}</h6>
                                                <p>{!! $archivo->description !!}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{ asset('storage/'.$archivo->file) }}" target="_blank">Ver</a>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <hr>
                    <h6 class="font-weight-bold">Imágenes</h6>
                    <div class="row">
                        @foreach($imagenes as $imagen)
                        <div class="col-md-3 col-sm-6">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <img src="{{ asset('storage/'.$imagen->file) }}" alt="{{ $imagen->name }}" class="img-thumbnail">
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