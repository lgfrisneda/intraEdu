<script src="https://cdn.ckeditor.com/4.15.0/basic/ckeditor.js"></script>    
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
                <select class="form-control" name="level_id" id="level_id">
                    <option value="">Seleccione</option>
                    @foreach($niveles as $nivel)
                        <option value="{{ $nivel->id}}" {{ isset($curso->level_id) && $curso->level_id == $nivel->id? 'selected': '' }}>{{ $nivel->name}}</option>
                    @endforeach
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