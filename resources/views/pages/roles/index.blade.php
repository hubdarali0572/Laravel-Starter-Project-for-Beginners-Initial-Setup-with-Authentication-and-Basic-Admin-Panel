@extends('layout.master')

@section('title', 'Roles & Permissions')
@section('subtitle', 'Manage access control')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @include('includes.messages')

    @include('includes.admin.page-toolbar', [
        'actionUrl' => route('roles.create'),
        'actionLabel' => 'Add Role',
        'actionPermission' => 'create role',
    ])

    <div class="card admin-table-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Role Name</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="text-slate-500 font-mono text-sm">#{{ $role->id }}</td>
                                <td class="font-semibold text-slate-700">{{ $role->name }}</td>
                                <td>
                                    <div class="admin-table-actions">
                                        @can('show role')
                                            <a href="{{ route('assign.role', $role->id) }}"
                                                class="admin-btn-icon admin-btn-icon-assign" title="Assign Role">
                                                <i class="fas fa-user-shield text-xs"></i>
                                            </a>
                                        @endcan
                                        @can('edit role')
                                            <a href="{{ route('roles.edit', $role->id) }}"
                                                class="admin-btn-icon admin-btn-icon-edit" title="Edit">
                                                <i class="fas fa-pen text-xs"></i>
                                            </a>
                                        @endcan
                                        @can('delete role')
                                            <form id="delete-form-{{ $role->id }}"
                                                action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                                class="d-inline m-0 p-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="admin-btn-icon admin-btn-icon-delete js-confirm-delete"
                                                    title="Delete"
                                                    data-delete-id="{{ $role->id }}"
                                                    data-delete-name="{{ $role->name }}">
                                                    <i class="fas fa-trash text-xs"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
@endpush
