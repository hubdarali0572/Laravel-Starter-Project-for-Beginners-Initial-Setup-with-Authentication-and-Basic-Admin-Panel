@extends('layout.master')

@section('title', 'Users')
@section('subtitle', 'Manage user accounts')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @include('includes.messages')

    @include('includes.admin.page-toolbar', [
        'actionUrl' => route('users.create'),
        'actionLabel' => 'Add User',
        'actionPermission' => 'create user',
    ])

    <div class="card admin-table-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="font-semibold text-slate-700">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="admin-table-actions">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="admin-btn-icon admin-btn-icon-edit" title="Edit">
                                            <i class="fas fa-pen text-xs"></i>
                                        </a>
                                        <form id="delete-form-{{ $user->id }}"
                                            action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="d-inline m-0 p-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="admin-btn-icon admin-btn-icon-delete js-confirm-delete"
                                                title="Delete"
                                                data-delete-id="{{ $user->id }}"
                                                data-delete-name="{{ $user->name }}">
                                                <i class="fas fa-trash text-xs"></i>
                                            </button>
                                        </form>
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
