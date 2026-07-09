@extends('layout.master')

@section('title', 'Assign Role')
@section('subtitle', 'Assign roles to users')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @include('includes.messages')

    <div class="card admin-form-card">
        <div class="card-body">
            <h6 class="admin-form-section-title">
                <i class="fas fa-user-shield"></i> Role Assignment
            </h6>

            <form id="signupForm" action="{{ route('assign.role') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label class="admin-form-label" for="user_id">Users <span class="required">*</span></label>
                        <select name="user_id[]" id="user_id" class="js-example-basic-multiple form-select admin-form-control"
                            multiple="multiple" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <p class="admin-form-hint">Select one or more users to assign a role.</p>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label class="admin-form-label" for="role">Role <span class="required">*</span></label>
                        <select name="role" id="role" class="js-example-basic-single form-select admin-form-control" required>
                            <option value="" disabled selected>Select a role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @include('includes.admin.form-actions', [
                    'cancelUrl' => route('roles.index'),
                    'submitLabel' => 'Assign Role',
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
