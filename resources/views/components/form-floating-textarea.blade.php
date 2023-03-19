@props(['label', 'id', 'type'])

<div class="form-floating mb-3">
    <textarea type="{{$type}}" class="form-control" id="{{$id}}" placeholder="name@example.com" value="{{ old($id) }}" style="height: 200px"  name="{{$id}}"></textarea>
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

