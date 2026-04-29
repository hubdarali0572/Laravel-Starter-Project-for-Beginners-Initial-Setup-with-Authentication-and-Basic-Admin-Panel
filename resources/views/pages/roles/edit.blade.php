@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @include('includes.messages')

 <h1 class="text-lg font-semibold mb-2">Edit The Role : {{ $role->name }}</h1>

<div class="row">
    <div class="col-md-12">
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Role Name Card -->
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-body">
                    <label for="name" class="form-label fw-bold">Role Name</label>
                    <input id="name" class="form-control border-secondary" name="name"
                        value="{{ old('name', $role->name) }}" type="text" placeholder="Please Enter Role Name" required>
                             <small class="text-muted mt-1 d-block">This name will be used to identify the group of
                        permissions.</small>
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
                        // UI Config based on group name
                        $config = [
                            'user' => ['color' => '#000', 'icon' => 'fa-user-shield', 'title' => 'User Management'],
                            'studentAdmission' => ['color' => '#000', 'icon' => 'fa-tags', 'title' => 'studentAdmission'],
                            'studentContact' => ['color' => '#000', 'icon' => 'fa-indent', 'title' => 'studentContact'],
                            'role' => ['color' => '#000', 'icon' => 'fa-key', 'title' => 'Role Management'],
                        ];
                        $style = $config[$group] ?? ['color' => '#000', 'icon' => 'fa-shield-alt', 'title' => ucfirst($group)];
                        
                        $allChecked = count(array_intersect($items->pluck('id')->toArray(), $roleHasPermissions)) == count($items);
                    @endphp

                    <div class="col">
                         <div class="card h-100 shadow-sm border-0 overflow-hidden" >
                            <div class="card-header py-3 d-flex justify-content-between align-items-center bg-slate-200" 
                                 style="border-bottom: 3px solid {{ $style['color'] }}">
                                
                                <h6 class="mb-0 fw-bold" style="color: {{ $style['color'] }}">
                                    <i class="fas {{ $style['icon'] }} me-2"></i> {{ $style['title'] }}
                                </h6>
                                
                                <div class="form-check form-switch">
                                    <input class="form-check-input select-all-module" type="checkbox" {{ $allChecked ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                @foreach($items as $permission)
                                    @php 
                                        $isDelete = str_contains(strtolower($permission->name), 'delete'); 
                                        $isChecked = in_array($permission->id, $roleHasPermissions);
                                    @endphp
                                    <div class="form-check mb-2">
                                        <input type="checkbox" name="permissions[]"
                                               value="{{ $permission->id }}" 
                                               class="form-check-input module-checkbox"
                                               id="perm-{{ $permission->id }}"
                                               {{ $isChecked ? 'checked' : '' }}>
                                        
                                        <label class="form-check-label {{ $isDelete ? 'text-danger' : '' }} font-medium" 
                                               for="perm-{{ $permission->id }}" style="cursor: pointer; font-size: 0.9rem;">
                                            {{ ucfirst($permission->name) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

    </div>
</div>

<script>
    // Logic for Toggle-All switches
    document.querySelectorAll('.select-all-module').forEach(toggle => {
        toggle.addEventListener('change', function() {
            const container = this.closest('.card');
            const checkboxes = container.querySelectorAll('.module-checkbox');
            checkboxes.forEach(cb => cb.checked = this.checked);
        });
    });

    // Auto-uncheck 'Master Toggle' if one item inside is unchecked
    document.querySelectorAll('.module-checkbox').forEach(cb => {
        cb.addEventListener('change', function() {
            const container = this.closest('.card');
            const masterToggle = container.querySelector('.select-all-module');
            const allChecked = container.querySelectorAll('.module-checkbox:not(:checked)').length === 0;
            masterToggle.checked = allChecked;
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