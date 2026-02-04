@props(['status'])

@if ($status)
<div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-400 mb-4 uppercase tracking-widest']) }}>
    {{ $status }}
</div>
@endif