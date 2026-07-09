@extends('layout.master')

@section('title', 'Edit User')
@section('subtitle', 'Update account details')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @include('includes.messages')

    <div class="card admin-form-card">
        <div class="card-body">
            <h6 class="admin-form-section-title">
                <i class="fas fa-user-pen"></i> Edit Profile — {{ $user->name }}
            </h6>

            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="name" class="admin-form-label">Name <span class="required">*</span></label>
                        <input id="name" class="form-control admin-form-control" name="name" type="text"
                            value="{{ old('name', $user->name) }}" placeholder="Enter full name">
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="email" class="admin-form-label">Email <span class="required">*</span></label>
                        <input type="email" name="email" id="email" class="form-control admin-form-control"
                            value="{{ old('email', $user->email) }}" placeholder="Enter email address">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="password" class="admin-form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control admin-form-control"
                            placeholder="Leave blank to keep current password">
                        <p class="admin-form-hint">Only fill in if you want to change the password.</p>
                    </div>
                </div>

                @include('includes.admin.form-actions', [
                    'cancelUrl' => route('users.index'),
                    'submitLabel' => 'Update User',
                ])
            </form>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/select2.js') }}"></script>
@endpush
