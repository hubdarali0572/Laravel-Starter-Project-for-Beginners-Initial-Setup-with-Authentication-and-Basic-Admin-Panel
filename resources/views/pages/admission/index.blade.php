@extends('layout.master')

@section('title', 'Student Admissions')
@section('subtitle', 'Manage admission applications')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @include('includes.messages')

    <div class="card admin-table-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Program</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studentAdmissions as $studentAdmission)
                            <tr>
                                <td class="font-semibold text-slate-700">{{ $studentAdmission->name }}</td>
                                <td>{{ $studentAdmission->email }}</td>
                                <td>+92{{ $studentAdmission->phone }}</td>
                                <td>{{ $studentAdmission->program }}</td>
                                <td>{{ ucfirst($studentAdmission->gender) }}</td>
                                <td>
                                    @if ($studentAdmission->status == 'approved')
                                        <span class="admin-badge admin-badge-success">Approved</span>
                                    @elseif ($studentAdmission->status == 'reject')
                                        <span class="admin-badge admin-badge-danger">Rejected</span>
                                    @elseif ($studentAdmission->status == 'pending')
                                        <span class="admin-badge admin-badge-warning">Pending</span>
                                    @else
                                        <span class="admin-badge admin-badge-secondary">{{ ucfirst($studentAdmission->status) }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="admin-table-actions">
                                        <a href="{{ route('studentAdmission.edit', $studentAdmission->id) }}"
                                            class="admin-btn-icon admin-btn-icon-view" title="View">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>
                                        <form id="delete-form-{{ $studentAdmission->id }}"
                                            action="{{ route('studentAdmission.destroy', $studentAdmission->id) }}"
                                            method="POST" class="d-inline m-0 p-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="admin-btn-icon admin-btn-icon-delete js-confirm-delete"
                                                title="Delete"
                                                data-delete-id="{{ $studentAdmission->id }}"
                                                data-delete-name="{{ $studentAdmission->name }}">
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
