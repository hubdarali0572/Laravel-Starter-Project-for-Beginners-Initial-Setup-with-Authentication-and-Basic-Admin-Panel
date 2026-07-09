@extends('layout.master')

@section('title', 'Admission Details')
@section('subtitle', 'Review and update application status')

@section('content')
    @include('includes.messages')

    <div class="card admin-detail-card">
        <div class="card-body">
            <h6 class="admin-form-section-title">
                <i class="fas fa-graduation-cap"></i> Student Admission Profile
            </h6>

            <div class="row">
                <div class="col-md-6 admin-detail-field">
                    <p class="field-label">Name</p>
                    <p class="field-value">{{ $studentAdmission->name }}</p>
                </div>
                <div class="col-md-6 admin-detail-field">
                    <p class="field-label">Email</p>
                    <p class="field-value">{{ $studentAdmission->email }}</p>
                </div>
                <div class="col-md-6 admin-detail-field">
                    <p class="field-label">Phone</p>
                    <p class="field-value">+92{{ $studentAdmission->phone ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6 admin-detail-field">
                    <p class="field-label">Program</p>
                    <p class="field-value">{{ $studentAdmission->program }}</p>
                </div>
                <div class="col-md-6 admin-detail-field">
                    <p class="field-label">Gender</p>
                    <p class="field-value">{{ ucfirst($studentAdmission->gender) }}</p>
                </div>
                <div class="col-md-6 admin-detail-field">
                    <p class="field-label">Current Status</p>
                    <p class="field-value">
                        @if ($studentAdmission->status == 'approved')
                            <span class="admin-badge admin-badge-success">Approved</span>
                        @elseif ($studentAdmission->status == 'reject')
                            <span class="admin-badge admin-badge-danger">Rejected</span>
                        @else
                            <span class="admin-badge admin-badge-warning">Pending</span>
                        @endif
                    </p>
                </div>
                <div class="col-12 admin-detail-field">
                    <p class="field-label">Notes</p>
                    <div class="admin-detail-notes">
                        {!! nl2br(e($studentAdmission->notes)) ?: 'No notes available.' !!}
                    </div>
                </div>
            </div>

            <hr class="my-4 border-slate-200">

            <form action="{{ route('studentAdmission.update', $studentAdmission->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row align-items-end">
                    <div class="col-md-4 mb-3">
                        <label class="admin-form-label" for="status">Update Status</label>
                        <select class="form-select admin-form-control" name="status" id="status">
                            <option value="approved" {{ $studentAdmission->status == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="reject" {{ $studentAdmission->status == 'reject' ? 'selected' : '' }}>Reject</option>
                            <option value="pending" {{ $studentAdmission->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <div class="admin-form-actions border-0 pt-0 mt-0 justify-content-start">
                            <button type="submit" class="admin-btn admin-btn-primary">
                                <i class="fas fa-check text-xs"></i> Update Status
                            </button>
                            <a href="{{ route('studentAdmission.index') }}" class="admin-btn admin-btn-secondary">
                                <i class="fas fa-arrow-left text-xs"></i> Back to List
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
