@extends('layout.master')

@section('title', 'Activity Logs')
@section('subtitle', 'System audit trail')

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
                            <th>#</th>
                            <th>Performed By</th>
                            <th>Record Name</th>
                            <th>Email</th>
                            <th>Resource</th>
                            <th>Action</th>
                            <th>IP Address</th>
                            <th>Date & Time</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($logs as $log)
                            @php
                                $detail = activity_log_record($log);
                                $actionBadge = activity_log_action_badge($detail['action']);
                            @endphp
                            <tr>
                                <td class="text-slate-500 font-mono text-sm">#{{ $log->id }}</td>
                                <td>
                                    <div class="font-semibold text-slate-700">{{ $log->causer->name ?? 'System' }}</div>
                                    @if ($detail['user_type'] !== '—')
                                        <div class="text-xs text-slate-400 mt-0.5">{{ $detail['user_type'] }}</div>
                                    @endif
                                </td>
                                <td class="font-semibold text-slate-700">{{ $detail['name'] }}</td>
                                <td>{{ $detail['email'] }}</td>
                                <td>
                                    <span class="font-medium text-slate-700">{{ $detail['resource'] }}</span>
                                    <span class="text-slate-400 text-sm"> #{{ $detail['resource_id'] }}</span>
                                    <div class="text-xs text-slate-400 mt-0.5 uppercase tracking-wide">{{ $detail['module'] }}</div>
                                </td>
                                <td>
                                    <span class="admin-badge {{ $actionBadge }}">{{ ucfirst($detail['action']) }}</span>
                                </td>
                                <td class="font-mono text-sm text-slate-600">{{ $detail['ip'] }}</td>
                                <td>
                                    <div class="font-medium text-slate-700">{{ $log->created_at->format('M d, Y') }}</div>
                                    <div class="text-xs text-slate-400">{{ $log->created_at->format('h:i A') }}</div>
                                </td>
                                <td>
                                    <div class="admin-table-actions">
                                        <form id="delete-form-{{ $log->id }}"
                                            action="{{ route('activitylog.destroy', $log->id) }}"
                                            method="POST" class="d-inline m-0 p-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="admin-btn-icon admin-btn-icon-delete js-confirm-delete"
                                                title="Delete"
                                                data-delete-id="{{ $log->id }}"
                                                data-delete-name="{{ $detail['label'] }}">
                                                <i class="fas fa-trash text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-8 text-slate-500">
                                    No activity logs found.
                                </td>
                            </tr>
                        @endforelse
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

@push('custom-scripts')
@endpush
