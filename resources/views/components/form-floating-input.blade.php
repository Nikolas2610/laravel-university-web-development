@props(['label', 'id', 'type'])

<div class="form-floating mb-3">
    <input type="{{$type}}" class="form-control" id="{{$id}}" placeholder="name@example.com" value="{{ old($id) }}" name="{{$id}}">
    <label for="floatingInput">{{ $label }}</label>
</div>
<div class="row">
    <div class="col text-danger" id="{{ $id }}-error">

    </div>
</div>
<div class="row">
    <div class="col text-danger">
        @error($id)
        {{$message}}
        @enderror
    </div>
</div>

