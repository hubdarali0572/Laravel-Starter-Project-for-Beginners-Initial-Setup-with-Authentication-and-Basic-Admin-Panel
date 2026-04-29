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
    <h4 class="text-lg font-semibold">Listing of Students</h4>
    @can('create role')
      <a href="#" class="btn bg-slate-200 text-dark hover:bg-slate-200 text-dark font-semibold">
        Add Student
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
                                    <th>program</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($studentAdmissions as $studentAdmission)
                                    <tr class="py-1">
                                        <td class="py-2">{{ $studentAdmission->name }}</td>
                                        <td class="py-2">{{ $studentAdmission->email }}</td>
                                        <td class="py-2">+92{{ $studentAdmission->phone }}</td>
                                        <td class="py-2">{{ $studentAdmission->program }}</td>
                                        <td class="py-2">{{ $studentAdmission->gender }}</td>
                                        <td class="py-2">
                                            @if($studentAdmission->status == 'approved')
                                                <span class="badge bg-success text-white"
                                                    style="width: 80px">{{ ucfirst($studentAdmission->status) }}</span>
                                            @elseif($studentAdmission->status == 'reject')
                                                <span class="badge bg-danger text-white"
                                                    style="width: 80px">{{ ucfirst($studentAdmission->status) }}</span>
                                            @elseif($studentAdmission->status == 'pending')
                                                <span class="badge bg-warning text-dark text-white"
                                                    style="width: 80px">{{ ucfirst($studentAdmission->status) }}</span>
                                            @else
                                                <span class="badge bg-secondary"
                                                    style="width: 80px">{{ ucfirst($studentAdmission->status) }}</span>
                                            @endif
                                        </td>

                                        <td class="py-1">
                                            <div class="d-flex justify-content-center align-items-center gap-1">
                                                <a href="{{ route('studentAdmission.edit', $studentAdmission->id) }}"
                                                    class="action-btn edit-btn" title="Edit">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                              <form id="delete-form-{{ $studentAdmission->id }}" 
                                                action="{{ route('studentAdmission.destroy', $studentAdmission->id) }}" 
                                                method="POST" class="d-inline m-0 p-0">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button" onclick="confirmDelete({{ $studentAdmission->id }})" 
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