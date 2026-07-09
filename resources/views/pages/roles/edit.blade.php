@extends('layout.master')

@section('title', 'Edit Role')
@section('subtitle', 'Update role and permissions')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @include('includes.messages')

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card admin-form-card mb-4">
            <div class="card-body">
                <h6 class="admin-form-section-title">
                    <i class="fas fa-shield-halved"></i> Role Details — {{ $role->name }}
                </h6>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="name" class="admin-form-label">Role Name <span class="required">*</span></label>
                        <input id="name" class="form-control admin-form-control" name="name"
                            value="{{ old('name', $role->name) }}" type="text" placeholder="Enter role name" required>
                        <p class="admin-form-hint">This name identifies the permission group.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-section-heading">
            <i class="fas fa-key"></i>
            <div>
                <div class="heading-text">Assign Permissions</div>
                <div class="heading-sub">Toggle a module or select individual permissions</div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($groupedPermissions as $group => $items)
                @php
                    $config = [
                        'user' => ['icon' => 'fa-users', 'title' => 'User Management'],
                        'studentAdmission' => ['icon' => 'fa-graduation-cap', 'title' => 'Student Admissions'],
                        'studentContact' => ['icon' => 'fa-envelope', 'title' => 'Student Contacts'],
                        'role' => ['icon' => 'fa-shield-halved', 'title' => 'Role Management'],
                    ];
                    $style = $config[$group] ?? ['icon' => 'fa-shield-alt', 'title' => ucfirst($group)];
                    $allChecked = count(array_intersect($items->pluck('id')->toArray(), $roleHasPermissions)) == count($items);
                @endphp

                <div class="col">
                    <div class="card admin-permission-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">
                                <i class="fas {{ $style['icon'] }} me-2"></i>{{ $style['title'] }}
                            </h6>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input select-all-module" type="checkbox"
                                    {{ $allChecked ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach ($items as $permission)
                                @php
                                    $isDelete = str_contains(strtolower($permission->name), 'delete');
                                    $isChecked = in_array($permission->id, $roleHasPermissions);
                                @endphp
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                        class="form-check-input module-checkbox" id="perm-{{ $permission->id }}"
                                        {{ $isChecked ? 'checked' : '' }}>
                                    <label class="form-check-label {{ $isDelete ? 'text-danger' : '' }} cursor-pointer"
                                        for="perm-{{ $permission->id }}">
                                        {{ ucfirst($permission->name) }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @include('includes.admin.form-actions', [
            'cancelUrl' => route('roles.index'),
            'submitLabel' => 'Update Role',
        ])
    </form>

    <script>
        document.querySelectorAll('.select-all-module').forEach(toggle => {
            toggle.addEventListener('change', function () {
                const checkboxes = this.closest('.card').querySelectorAll('.module-checkbox');
                checkboxes.forEach(cb => cb.checked = this.checked);
            });
        });
        document.querySelectorAll('.module-checkbox').forEach(cb => {
            cb.addEventListener('change', function () {
                const container = this.closest('.card');
                const masterToggle = container.querySelector('.select-all-module');
                masterToggle.checked = container.querySelectorAll('.module-checkbox:not(:checked)').length === 0;
            });
        });
    </script>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/select2.js') }}"></script>
@endpush
