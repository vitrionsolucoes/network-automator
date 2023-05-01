@props(['status'])

@php
    switch ($status) {
        case 'inactive':
        case 'open':
            $colorClasses = 'bg-red-50 text-red-600';
            break;
        case 'active':
        case 'closed':
            $colorClasses = 'bg-green-50 text-green-600';
            break;
        default:
            $colorClasses = 'bg-blue-50 text-blue-600';
            break;
    }
@endphp

<span class="inline-flex items-center rounded-full text-xs font-semibold {{ $colorClasses }}">
    {{ trans('messages.' . $status) }}
</span>

