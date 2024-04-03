@props([
    'type' => 'text',
    'value'=> '',
    'isError' => false,
    'placeholder' => '',
    'id' => '',
    'autocomplete'=>'',
    'optional' => ''
])
<input
    type="{{ $type  }}"
    id="{{ $id }}"
    value="{{ $value  }}"
    @if($autocomplete)
        autocomplete="{{ $autocomplete }}"
        @endif
    {{ $attributes->class([
    '_is-error' => $isError,
    $optional,
    'inputClass'
]) }}
><label class="labelInput" for="{{ $id }}">{{ $placeholder }}</label>
