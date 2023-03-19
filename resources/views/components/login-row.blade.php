@props(['label', 'id'])

<div class="row mb-3">
    <div class="col-lg-4 col-6">
        {{ $label }}
    </div>
    <div class="col-lg-4 col-6">
        {{ $slot }}
    </div>

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
