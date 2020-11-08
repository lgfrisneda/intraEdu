    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ isset($usuario->name)? $usuario->name: old('name') }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="{{ isset($usuario->email)? $usuario->email: old('email') }}">
    </div>
    <div class="row clearfix">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Password</label>
                <input type="password" class="form-control" name="password" id="password">
                <small id="passwordHelp" class="form-text text-muted">Minimo 8 caracteres, dejar vacio si no se desea modificar</small>
            </div>
        </div>
        <div class="col-sm-6" style="display: none;">
            <div class="form-group">
                <label for="name">Rol</label>
                <input type="password" class="form-control" name="other" id="other" value="{{ isset($usuario->other)? $usuario->other: old('other') }}">
            </div>
        </div>
    </div>
    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="reset" class="btn btn-danger">Borrar</button>
    </div>