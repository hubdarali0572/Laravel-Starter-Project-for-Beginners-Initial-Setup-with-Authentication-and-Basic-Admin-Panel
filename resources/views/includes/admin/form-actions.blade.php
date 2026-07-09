{{-- Form submit / cancel actions --}}
@props(['cancelUrl', 'submitLabel' => 'Save Changes'])

<div class="admin-form-actions">
    <a href="{{ $cancelUrl }}" class="admin-btn admin-btn-secondary">
        <i class="fas fa-arrow-left text-xs"></i>
        Cancel
    </a>
    <button type="submit" class="admin-btn admin-btn-primary">
        <i class="fas fa-check text-xs"></i>
        {{ $submitLabel }}
    </button>
</div>
