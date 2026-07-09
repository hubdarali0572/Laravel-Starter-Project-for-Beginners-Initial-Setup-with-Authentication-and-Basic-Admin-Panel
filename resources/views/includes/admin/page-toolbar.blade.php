{{-- Page toolbar: optional action button on index pages --}}
@props(['actionUrl' => null, 'actionLabel' => null, 'actionPermission' => null])

@if($actionUrl && $actionLabel)
    <div class="admin-toolbar mb-4">
        <div></div>
        @if(!$actionPermission || auth()->user()->can($actionPermission))
            <a href="{{ $actionUrl }}" class="admin-btn admin-btn-primary">
                <i class="fas fa-plus text-xs"></i>
                {{ $actionLabel }}
            </a>
        @endif
    </div>
@endif
