@props([
    'id',
    'name',
    'value' => null,
    'type' => null,
    'span' => 'Faltou algo Migo',
    'required' => false,
    'erro' => '',
])

<div class="input-group mt-3">
    <span class="input-group-text col-md-2" for="{{$id}}">{{$span}}</span>
    <input class="form-control col-md-10" type="{{$type}}" id="{{$id}}" name="{{$name}}" value="{{$value}}" {{$required ? 'required' : ''}}>
</div>
@error($name)
@if (empty($erro))
<div class="form-text text-danger">{{$message}}</div>
@else
<div class="form-text text-danger">{{$erro}}</div>
@endif
@enderror