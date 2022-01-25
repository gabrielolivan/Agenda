@props([
    'id',
    'name',
    'value' => null,
    'type' => null,
    'span' => 'Faltou algo Migo',
    'required' => false,
    'erro' => '',
])

<div class="input-group mb-3">
    <span class="input-group-text" for="{{$id}}">{{$span}}</span>
    <input class="form-control" type="{{$type}}" id="{{$id}}" name="{{$name}}" value="{{$value}}" {{$required ? 'required' : ''}}>
    @error($name)
    @if (empty($erro))
    <div class="form-text text-danger">{{$message}}</div>
    @else
    <div class="form-text text-danger">{{$erro}}</div>
    @endif
    @enderror
</div>