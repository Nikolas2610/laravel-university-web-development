@props(['label', 'note', 'id'])

<div class="row d-flex align-items-center mb-2">
    <div class="col-lg-4 col-12">
        <strong>{{ $label }}</strong>
    </div>
    <div class="col-lg-4 col-12 mt-2 mt-lg-0">
        {{ $slot }}
    </div>
    <div class="col-lg-4 col-12 text-danger">
        {{ $note }}
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
</div>
