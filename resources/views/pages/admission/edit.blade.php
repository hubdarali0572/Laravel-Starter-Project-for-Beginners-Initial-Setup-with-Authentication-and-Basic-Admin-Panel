@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @include('includes.messages')


    <nav class="page-breadcrumb">
        <h4 class="card-title">Student Admission Profile</h4>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <h6 class="text-muted">Name</h6>
                            <p class="fw-semibold">{{ $studentAdmission->name }}</p>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <h6 class="text-muted">Email</h6>
                            <p class="fw-semibold">{{ $studentAdmission->email }}</p>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <h6 class="text-muted">Phone</h6>
                            <p class="fw-semibold">+92{{ $studentAdmission->phone ?? 'N/A' }}</p>
                        </div>

                        <!-- Program -->
                        <div class="col-md-6 mb-3">
                            <h6 class="text-muted">Program</h6>
                            <p class="fw-semibold">{{ $studentAdmission->program }}</p>
                        </div>

                        <!-- Gender -->
                        <div class="col-md-6 mb-3">
                            <h6 class="text-muted">Gender</h6>
                            <p class="fw-semibold">{{ ucfirst($studentAdmission->gender) }}</p>
                        </div>

                        <!-- Status (Editable) -->
                        <div class="col-md-6 mb-3">
                            <form action="{{ route('studentAdmission.update', $studentAdmission->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <h6 class="text-muted">Status</h6>
                                <select class="form-select" name="status">
                                    <option value="approved" {{ $studentAdmission->status == 'approved' ? 'selected' : '' }}>
                                        Approved</option>
                                    <option value="reject" {{ $studentAdmission->status == 'reject' ? 'selected' : '' }}>
                                        Reject</option>
                                    <option value="pending" {{ $studentAdmission->status == 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                </select>
                                <div class="mt-3 d-flex gap-2">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check me-1"></i>
                                        Update</button>
                                    <a href="{{ route('studentAdmission.index') }}" class="btn btn-danger"><i
                                            class="fas fa-times me-1"></i> Cancel</a>
                                </div>
                            </form>
                        </div>
                        <!-- Notes -->
                        <div class="col-md-12 mb-3">
                            <h6 class="text-muted">Notes</h6>
                            <div class="p-3 bg-light border rounded">
                                {!! nl2br(e($studentAdmission->notes)) ?? 'No Notes Available' !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/select2.js') }}"></script>
@endpush