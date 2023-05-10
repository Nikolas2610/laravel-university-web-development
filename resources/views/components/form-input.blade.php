@props(['id', 'name', 'type' => 'text', 'maxlength' => null, 'minlength' => null, 'max' => null, 'step' => null, 'placeholder' => null, 'classes' => null, 'inputValue' => null, 'disabled' => false])

<div class="form-group">
    <input type="{{ $type }}" class="form-control @if (!is_null($classes)) {{ $classes }} @endif"
        id="{{ $id }}" name="{{ $name }}" value="{{ !is_null($inputValue) ? $inputValue : old($name) }}"
        @if ($disabled) disabled @endif
        @if (!is_null($maxlength)) maxlength="{{ $maxlength }}" @endif
        @if (!is_null($minlength)) minlength="{{ $minlength }}" @endif
        @if (!is_null($max)) max="{{ $max }}" @endif
        @if (!is_null($step)) step="{{ $step }}" @endif
        @if (!is_null($placeholder)) placeholder="{{ $placeholder }}" @endif {{ $attributes }}>
</div>
