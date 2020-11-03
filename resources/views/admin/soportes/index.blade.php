@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ url('/unidades/'.$unidad->id) }}"><i class="fas fa-arrow-left"></i></a>
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold">
                        Archivos/soportes de {{ $unidad->name }}
                        <a href="{{ url('/soportes/create/'.$unidad->id) }}" class="btn btn-sm btn-success float-right"><i class="fas fa-plus"></i></a>
                    </h4>
                </div>
                <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($soportes as $soporte)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td width="25%"><span class="badge badge-{{ $soporte->type->badge }}">{{ $soporte->type->name }}</span></td>
                            <td>{{ $soporte->name }}</td>
                            <td>
                                <a href="{{ url('/soportes/'.$soporte->id.'/edit') }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                                <form method="post" action="{{ url('/soportes/'.$soporte->id) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Seguro que desea borrar el soporte {{ $soporte->name }} de la unidad {{ $soporte->lesson_id }}?');"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection