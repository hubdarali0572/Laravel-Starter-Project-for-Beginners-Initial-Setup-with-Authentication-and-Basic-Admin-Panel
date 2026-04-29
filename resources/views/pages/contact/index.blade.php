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
    <h4 class="text-lg font-semibold">Listing of Teachers</h4>
    @can('create role')
      <a href="#" class="btn bg-slate-200 text-dark hover:bg-slate-200 text-dark font-semibold">
        Add Teacher
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
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($studentContacts as $studentContact)
                                    <tr class="py-1">
                                        <td class="py-2">{{ $studentContact->name }}</td>
                                        <td class="py-2">{{ $studentContact->email }}</td>
                                        <td class="py-2">+92{{ $studentContact->phone }}</td>
                                        <td class="py-2">
                                            @if($studentContact->status == 'seen')
                                                <span class="badge bg-success text-white"
                                                    style="width: 80px">{{ ucfirst($studentContact->status) }}</span>
                                            @elseif($studentContact->status == 'pending')
                                                <span class="badge bg-warning text-dark text-white"
                                                    style="width: 80px">{{ ucfirst($studentContact->status) }}</span>
                                            @else
                                                <span class="badge bg-secondary"
                                                    style="width: 80px">{{ ucfirst($studentContact->status) }}</span>
                                            @endif
                                        </td>

                                        <td class="py-1">
                                            <div class="d-flex justify-content-center align-items-center gap-1">
                                                <a href="{{ route('studentContact.edit', $studentContact->id) }}"
                                                    class="action-btn edit-btn" title="Edit">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <form id="delete-form-{{ $studentContact->id }}"
                                                    action="{{ route('studentContact.destroy', $studentContact->id) }}"
                                                    method="POST" class="d-inline m-0 p-0">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" onclick="confirmDelete({{ $studentContact->id }})"
                                                        class="action-btn delete-btn" title="Delete">
                                                        <i class="fas fa-trash"></i>
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