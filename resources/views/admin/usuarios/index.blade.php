@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold">
                        Usuarios registrados
                        <a href="{{ url('/usuarios/create/') }}" class="btn btn-sm btn-success float-right"><i class="fas fa-plus"></i></a>
                    </h4>
                </div>
                <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td width="25%"><span class="badge badge-primary">Rol</span></td>
                            <td>{{ $usuario->name }}</td>
                            <td>
                                <a href="{{ url('/usuarios/'.$usuario->id.'/edit') }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                                <form method="post" action="{{ url('/usuarios/'.$usuario->id) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Seguro que desea borrar al usuario {{ $usuario->name }} ?');"><i class="fas fa-trash"></i></button>
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