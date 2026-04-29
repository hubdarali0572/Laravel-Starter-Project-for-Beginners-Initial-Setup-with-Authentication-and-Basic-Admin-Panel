@extends('layout.master')
@section('title', 'Add Role')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

@section('content')
    @include('includes.messages')

  <h1 class="text-lg font-semibold mb-2">Add The Role</h1>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf

        <div class="card shadow-sm border-0 mb-4 rounded-3">
            <div class="card-body p-4">
                <div class="col-12">
                    <label for="name" class="form-label fw-bold text-dark">Role Name</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-secondary-subtle text-primary">
                            <i class="fas fa-tag"></i>
                        </span>
                        <input id="name" class="form-control border-secondary-subtle px-3" name="name"
                            value="{{ old('name') }}" type="text" placeholder="e.g. Editor, Admin, Moderator" required>
                    </div>
                    <small class="text-muted mt-1 d-block">This name will be used to identify the group of
                        permissions.</small>
                </div>
            </div>
            
            <div class="flex justify-center items-start mb-3 gap-2">
                    <a href="{{ route('roles.index') }}" class="btn bg-slate-200 text-dark hover:bg-slate-200  font-semibold">Cancel</a>
                    <button type="submit"  class="btn bg-slate-200 text-dark hover:bg-slate-200 text-dark font-semibold">Submit</button>
            </div>
        </div>

        <h5 class="fw-bold mb-3 d-flex align-items-center">
            <i class="fas fa-user-shield me-2 text-primary"></i>
            Assign Permissions
        </h5>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($groupedPermissions as $group => $items)
                @php
                    $config = [
                        'user' => ['color' => '#000', 'icon' => 'fa-user-shield', 'title' => 'User Management'],
                            'studentAdmission' => ['color' => '#000', 'icon' => 'fa-tags', 'title' => 'studentAdmission'],
                            'studentContact' => ['color' => '#000', 'icon' => 'fa-indent', 'title' => 'studentContact'],
                            'role' => ['color' => '#000', 'icon' => 'fa-key', 'title' => 'Role Management'],
                        ];
                    $module = $config[$group] ?? ['color' => '#000', 'icon' => 'fa-check-square', 'title' => ucfirst($group)];
                @endphp

                <div class="col">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden" >
                        <div class="card-header d-flex justify-content-between align-items-center py-3 bg-slate-200"
                            style="border-bottom: 3px solid {{ $module['color'] }};">

                            <h6 class="mb-0 fw-bold" style="color: {{ $module['color'] }};">
                                <i class="fas {{ $module['icon'] }} me-2"></i> {{ $module['title'] }}
                            </h6>

                            <div class="form-check form-switch">
                                <input class="form-check-input select-all-module" type="checkbox" role="switch"
                                    title="Select All in this module">
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach ($items as $permission)
                                @php $isDelete = str_contains(strtolower($permission->name), 'delete'); @endphp

                                <div class="form-check hover-row">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                        class="form-check-input group-checkbox shadow-none" id="perm-{{ $permission->id }}">
                                    <label class="form-check-label {{ $isDelete ? 'text-danger' : 'text-dark' }} cursor-pointer font-medium"
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

    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Toggle all inside specific card
            document.querySelectorAll('.select-all-module').forEach(toggle => {
                toggle.addEventListener('change', function () {
                    const cardBody = this.closest('.card').querySelector('.card-body');
                    const checkboxes = cardBody.querySelectorAll('.group-checkbox');
                    checkboxes.forEach(cb => cb.checked = this.checked);
                });
            });

            // Update 'Master Switch' if user unchecks items manually
            document.querySelectorAll('.group-checkbox').forEach(cb => {
                cb.addEventListener('change', function () {
                    const card = this.closest('.card');
                    const switchInput = card.querySelector('.select-all-module');
                    const allChecked = card.querySelectorAll('.group-checkbox:not(:checked)').length === 0;
                    switchInput.checked = allChecked;
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