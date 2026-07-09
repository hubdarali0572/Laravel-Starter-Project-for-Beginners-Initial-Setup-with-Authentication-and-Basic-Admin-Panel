@extends('layout.master')

@section('title', 'Contact Details')
@section('subtitle', 'Review and update inquiry status')

@section('content')
    @include('includes.messages')

    <div class="card admin-detail-card">
        <div class="card-body">
            <h6 class="admin-form-section-title">
                <i class="fas fa-envelope"></i> Contact Inquiry
            </h6>

            <div class="row">
                <div class="col-md-6 admin-detail-field">
                    <p class="field-label">Name</p>
                    <p class="field-value">{{ $studentContact->name }}</p>
                </div>
                <div class="col-md-6 admin-detail-field">
                    <p class="field-label">Email</p>
                    <p class="field-value">{{ $studentContact->email }}</p>
                </div>
                <div class="col-md-6 admin-detail-field">
                    <p class="field-label">Phone</p>
                    <p class="field-value">+92{{ $studentContact->phone ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6 admin-detail-field">
                    <p class="field-label">Current Status</p>
                    <p class="field-value">
                        @if ($studentContact->status == 'seen')
                            <span class="admin-badge admin-badge-success">Seen</span>
                        @else
                            <span class="admin-badge admin-badge-warning">Pending</span>
                        @endif
                    </p>
                </div>
                <div class="col-12 admin-detail-field">
                    <p class="field-label">Message</p>
                    <div class="admin-detail-notes">
                        {!! nl2br(e($studentContact->message)) ?: 'No message provided.' !!}
                    </div>
                </div>
            </div>

            <hr class="my-4 border-slate-200">

            <form action="{{ route('studentContact.update', $studentContact->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row align-items-end">
                    <div class="col-md-4 mb-3">
                        <label class="admin-form-label" for="status">Update Status</label>
                        <select class="form-select admin-form-control" name="status" id="status">
                            <option value="seen" {{ $studentContact->status == 'seen' ? 'selected' : '' }}>Seen</option>
                            <option value="pending" {{ $studentContact->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <div class="admin-form-actions border-0 pt-0 mt-0 justify-content-start">
                            <button type="submit" class="admin-btn admin-btn-primary">
                                <i class="fas fa-check text-xs"></i> Update Status
                            </button>
                            <a href="{{ route('studentContact.index') }}" class="admin-btn admin-btn-secondary">
                                <i class="fas fa-arrow-left text-xs"></i> Back to List
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
