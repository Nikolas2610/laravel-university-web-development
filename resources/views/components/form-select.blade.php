@props(['options' => [], 'name'])

<select {{ $attributes->merge(['class' => 'form-select']) }} name="{{ $name }}" id="{{$name}}">
    <option selected></option>
    @foreach($options as $option)
        <option value="{{ $option->id }}" {{ old($name) == $option->name ? 'selected' : '' }}>{{ $option->name }}</option>
    @endforeach
</select>
