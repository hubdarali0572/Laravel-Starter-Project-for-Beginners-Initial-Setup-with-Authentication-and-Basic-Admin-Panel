@extends('layout.master')
@section('title', 'Assign Role')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @include('includes.messages')
    <h1 class="text-lg font-semibold mb-2">Assign Role</h1>
    <div class="row mt-2">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form id="signupForm" action="{{ route('assign.role') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                <label class="form-group mb-2" for="user_id"><Strong>User</Strong></label>
                                <select name="user_id[]" id="user_id" class="js-example-basic-multiple form-select"
                                    multiple="multiple" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                <label class="form-group mb-2" for="role"><Strong>Role</Strong></label>
                                <select name="role" id="role" class="form-control border border-dark" required>
                                    <option value="" disabled selected>- Please Select -</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-center items-start mb-3 gap-2">
                            <a href="{{ route('roles.index') }}"
                                class="btn bg-slate-200 text-dark hover:bg-slate-200  font-semibold">Cancel</a>
                            <button type="submit"
                                class="btn bg-slate-200 text-dark hover:bg-slate-200 text-dark font-semibold">Submit</button>
                        </div>

                    </form>
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