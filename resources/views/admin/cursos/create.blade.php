@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ url('/admin/cursos') }}"><i class="fas fa-arrow-left"></i></a>
            <div class="card">
                <div class="card-header">
                    Agregar curso
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ url('/admin/cursos') }}" method="post">
                        @csrf
                        @include('admin.cursos.partials.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection