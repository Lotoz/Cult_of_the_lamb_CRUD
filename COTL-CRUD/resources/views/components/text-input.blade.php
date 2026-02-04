@props(['disabled' => false])

<input
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
'class' => 'border-gray-700 bg-gray-900 text-gray-100 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm transition duration-150 ease-in-out'
]) !!}
>