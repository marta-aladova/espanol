<form action="{{route('vocabulary.edit')}}" method="post" class="w-100">
    @csrf
    <input type="hidden" name="id" value="{{$word->id}}">
    <div class="d-flex flex-nowrap align-items-center mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Es</span>
        </div>
        <input type="text" class="form-control" name="es" value="{{$word->es}}" style="width:200px">
        <div class="input-group-prepend">
            <span class="input-group-text">Lt</span>
        </div>
        <input type="text" class="form-control" name="lt" value="{{$word->lt}}" style="width:200px">
        <div class="input-group-prepend">
            <span class="input-group-text">Lesson</span>
        </div>
        <select name="lesson_id" class="form-control">
            <option value="1" <?= $word->lesson_id == '1' ? 'selected' : ''?>>1</option>
            <option value="2" <?= $word->lesson_id == '2' ? 'selected' : ''?>>2</option>
            <option value="3" <?= $word->lesson_id == '3' ? 'selected' : ''?>>3</option>
            <option value="4" <?= $word->lesson_id == '4' ? 'selected' : ''?>>4</option>
        </select>
        <button type="submit" class="btn btn-info" style="width:250px">Edit a word</button>
    </div>

</form>