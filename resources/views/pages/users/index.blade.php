@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @include('includes.messages')

    <div class="flex justify-between items-center mb-2">
        <h4 class="text-lg font-semibold">Listing Of Users</h4>
        @can('create user')
            <a href="{{ route('users.create') }}" class="btn bg-slate-200 text-dark hover:bg-slate-200 text-dark font-semibold">
                Add User
            </a>
        @endcan
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($users as $user)
                                    <tr class="py-1">
                                        <td class="py-2">{{ $user->name }}</td>
                                        <td class="py-2">{{ $user->email }}</td>
                                        <td class="py-1">
                                            <div class="d-flex justify-content-center align-items-center gap-1">
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn bg-slate-200 text-dark hover:bg-slate-200 text-dark font-semibold  text-md px-2 py-2"
                                                    title="Edit">
                                                    <i class="fas fa-edit text-md text-green-500"></i>
                                                </a>
                                                <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    class="d-inline m-0 p-0">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" onclick="confirmDelete({{ $user->id }})"
                                                        class="btn bg-slate-200 text-dark hover:bg-slate-200 font-semibold text-md px-2 py-2"
                                                        title="Delete">
                                                        <i class="fas fa-trash text-md text-[#ef4444]"></i>
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
        </div>
    </div>
@endsection

<script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>

@endpush

@push('plugin-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>

    <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>

@endpush