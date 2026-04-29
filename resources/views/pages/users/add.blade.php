@extends('layout.master')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @include('includes.messages')

    <h1 class="text-lg font-semibold mb-2">Add The User</h1>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6  mb-3">
                                <label for="name" class="form-label"><strong>Name</strong> <span class="text-red-600">*</span></label>
                                <input id="name" class="form-control border border-secondary" name="name" value="{{old('name')}}" type="text"
                                    placeholder="Please Enter the Name">
                            </div>
                            <div class="col-12 col-md-6 col-lg-6  mb-3">
                                <label for="email" class="form-label"><strong>Email</strong> <span class="text-red-600">*</span></label>
                                <input type="email" name="email" id="email" class="form-control border border-secondary" value="{{old('email')}}"
                                    placeholder="Please Enter the Email">
                            </div>
                            <div class="col-12 col-md-12 col-lg-12  mb-3">
                                <label for="password" class="form-label"><strong>Password</strong>  <span class="text-red-600">*</span></label>
                                <input type="password" name="password" id="password"  class="form-control border border-secondary" value="{{old('password')}}"
                                    placeholder="Please Enter the Password" >
                            </div>

                           <div class="flex justify-center items-start mt-4 gap-2">
                                    <a href="{{ route('users.index') }}" class="btn bg-slate-200 text-dark hover:bg-slate-200  font-semibold">Cancel</a>
                                    <button type="submit"  class="btn bg-slate-200 text-dark hover:bg-slate-200 text-dark font-semibold">Submit</button>
                            </div>
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