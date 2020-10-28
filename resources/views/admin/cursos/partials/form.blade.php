<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>    
    <div class="form-group">
        <label for="name">Nombre del curso</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ isset($curso->name)? $curso->name: old('name') }}">
    </div>
    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" name="description" id="description" rows="3">{{ isset($curso->description)? $curso->description: old('description') }}</textarea>
    </div>
    <div class="row clearfix">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="level">Nivel</label>
                <select class="form-control" name="level" id="level">
                    <option value="">Seleccione</option>
                    <option value="Junior" {{ isset($curso->level) && $curso->level == 'Junior'? 'selected': '' }}>Junior</option>
                    <option value="Medio" {{ isset($curso->level) && $curso->level == 'Medio'? 'selected': '' }}>Medio</option>
                    <option value="Senior" {{ isset($curso->level) && $curso->level == 'Senior'? 'selected': '' }}>Senior</option>
                    <option value="Personalizado" {{ isset($curso->level) && $curso->level == 'Personalizado'? 'selected': '' }}>Personalizado</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="order">Orden</label>
                <input type="number" class="form-control" name="order" id="order" value="{{ isset($curso->order)? $curso->order: old('order') }}">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="syllabus">Temario</label>
        <textarea class="form-control" id="syllabus" name="syllabus">{{ isset($curso->syllabus)? $curso->syllabus: old('syllabus') }}</textarea>
    </div>
    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="reset" class="btn btn-danger">Borrar</button>
    </div>

    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('syllabus');
    </script>