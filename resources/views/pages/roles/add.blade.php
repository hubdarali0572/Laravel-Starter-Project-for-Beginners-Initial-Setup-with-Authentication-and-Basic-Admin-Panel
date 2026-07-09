@extends('layout.master')

@section('title', 'Add Role')
@section('subtitle', 'Create role and assign permissions')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @include('includes.messages')

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf

        <div class="card admin-form-card mb-4">
            <div class="card-body">
                <h6 class="admin-form-section-title">
                    <i class="fas fa-shield-halved"></i> Role Details
                </h6>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="name" class="admin-form-label">Role Name <span class="required">*</span></label>
                        <input id="name" class="form-control admin-form-control" name="name"
                            value="{{ old('name') }}" type="text" placeholder="e.g. Editor, Manager" required>
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

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-4">
            @foreach ($groupedPermissions as $group => $items)
                @php
                    $config = [
                        'user' => ['icon' => 'fa-users', 'title' => 'User Management'],
                        'studentAdmission' => ['icon' => 'fa-graduation-cap', 'title' => 'Student Admissions'],
                        'studentContact' => ['icon' => 'fa-envelope', 'title' => 'Student Contacts'],
                        'role' => ['icon' => 'fa-shield-halved', 'title' => 'Role Management'],
                    ];
                    $module = $config[$group] ?? ['icon' => 'fa-check-square', 'title' => ucfirst($group)];
                @endphp

                <div class="col">
                    <div class="card admin-permission-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">
                                <i class="fas {{ $module['icon'] }} me-2"></i>{{ $module['title'] }}
                            </h6>
                            <div class="form-check form-switch mb-0 mr-5">
                                <input class="form-check-input select-all-module" type="checkbox" role="switch"
                                    title="Select all in this module">
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach ($items as $permission)
                                @php $isDelete = str_contains(strtolower($permission->name), 'delete'); @endphp
                                <div class="form-check ml-5">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                        class="form-check-input group-checkbox" id="perm-{{ $permission->id }}">
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
            'submitLabel' => 'Create Role',
        ])
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.select-all-module').forEach(toggle => {
                toggle.addEventListener('change', function () {
                    const checkboxes = this.closest('.card').querySelectorAll('.group-checkbox');
                    checkboxes.forEach(cb => cb.checked = this.checked);
                });
            });
            document.querySelectorAll('.group-checkbox').forEach(cb => {
                cb.addEventListener('change', function () {
                    const card = this.closest('.card');
                    const switchInput = card.querySelector('.select-all-module');
                    switchInput.checked = card.querySelectorAll('.group-checkbox:not(:checked)').length === 0;
                });
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
