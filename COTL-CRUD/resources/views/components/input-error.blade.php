@props(['messages'])

@if ($messages)
<ul {{ $attributes->merge(['class' => 'text-sm text-red-500 space-y-1 font-bold']) }}>
    @foreach ((array) $messages as $message)
    <li>• {{ $message }}</li>
    @endforeach
</ul>
@endif