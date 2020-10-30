<script src="https://cdn.ckeditor.com/4.15.0/basic/ckeditor.js"></script>    
    <div class="row clearfix">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Nombre de soporte</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ isset($soporte->name)? $soporte->name: old('name') }}">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="level">Tipo</label>
                <select class="form-control" name="type_support_id" id="type_support_id">
                    <option value="">Seleccione</option>
                    @foreach($tipoSoportes as $tipoSoporte)
                    <option value="{{ $tipoSoporte->id }}" {{ isset($soporte->type_support_id) && $soporte->type_support_id == $tipoSoporte->id ? 'selected': '' }}>{{ $tipoSoporte->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" name="description" id="description" rows="3">{{ isset($soporte->description)? $soporte->description: old('description') }}</textarea>
    </div>
    <div class="row clearfix">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="file">File</label>
                <input type="file" class="form-control" name="file" id="file">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="numeric">Orden</label>
                <input type="number" class="form-control" name="order" id="order" value="{{ isset($soporte->order)? $soporte->order: old('order') }}">
                <input type="hidden" class="form-control" name="lesson_id" id="lesson_id" value="{{ isset($soporte->lesson_id)? $soporte->lesson_id: $unidad->id }}">
            </div>
        </div>
    </div>
    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="reset" class="btn btn-danger">Borrar</button>
    </div>

    <script>
        CKEDITOR.replace('description');
    </script>