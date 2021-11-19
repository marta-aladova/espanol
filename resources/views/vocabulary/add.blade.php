<h2 class="heading2">Add a new word</h2>
<form action="{{route('vocabulary.create')}}" method="post">
    @csrf
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Es</span>
        </div>
        <input type="text" class="form-control" name="es" value="{{old('es')}}">
        <div class="input-group-prepend">
            <span class="input-group-text">Lt</span>
        </div>
        <input type="text" class="form-control" name="lt" value="{{old('lt')}}">
        <div class="input-group-prepend">
            <span class="input-group-text">Lesson</span>
        </div>
        <select name="lesson_id" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <button type="submit" class="btn btn-info">Add a word</button>
    </div>
    @if($errors->any())
        <p class="small text-danger">Ooops! Something went wrong, Try again :)</p>
    @endif
</form>