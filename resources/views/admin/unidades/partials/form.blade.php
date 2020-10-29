<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>    
    <div class="form-group">
        <label for="name">Nombre de la unidad</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ isset($unidad->name)? $unidad->name: old('name') }}">
    </div>
    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" name="description" id="description" rows="3">{{ isset($unidad->description)? $unidad->description: old('description') }}</textarea>
    </div>
    <div class="row clearfix">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="order">Orden</label>
                <input type="number" class="form-control" name="order" id="order" value="{{ isset($unidad->order)? $unidad->order: old('order') }}">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="hidden" class="form-control" name="course_id" id="course_id" value="{{ isset($unidad->course_id)? $unidad->course_id: $curso->id }}">
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