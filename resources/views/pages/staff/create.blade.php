@extends('layouts.app')
@section('title', 'Add Staff')

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/image-preview.css')}}">
@endpush

@section('content')

    <!--begin::Card Header-->
    <div class="card-header mb-3">
        <div class="row">
            <div class="col-6">
                <h1 class="h3 d-inline align-middle">Staff Information</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('staff.index') }}" class="btn btn-success">
                    <i data-feather="list"></i> Staff List
                </a>
            </div>
        </div>
    </div>
    <!--end::Card Header-->

    <!--begin::Validation Message-->
    @include('include.validation-message')
    <!--end::Validation Message-->


    <div class="card">
        <form class="needs-validation" action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-2">
                    <label for="name" class="form-label">Staff Name<span class="text-danger">*</span></label>
                    <input type="text" id="name" class="form-control" placeholder="Staff Name" name="name"
                        required value="{{old('name')}}">
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                    <input type="text" id="email" class="form-control" placeholder="Staff email" name="email"
                        required value="{{old('email')}}">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Road Assign<span class="text-danger">*</span></label>
                    <select class="form-select basic-single" name="roads[]" multiple required>
                        <option value="">Select One</option>
                        @foreach ($roads as $road)
                            <option value="{{ $road }}">{{ $road }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2">
                    <label for="password" class="form-label">Profile Picture</label>
                    <div class="basic-image-upload">
                        <div class="image-edit">
                            <input type='file' name="profile_photo_path" id="basic-image" accept=".png, .jpg, .jpeg" />
                            <label for="basic-image">
                                <i data-feather="edit"></i>
                            </label>
                        </div>
                        <div class="image-preview">
                            <div id="image-preview"
                                style="background-image: url({{ asset('assets/img/avatar.jpg') }});"
                                class="img-fluid img-thumbnail">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-2">
                    <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                    <input type="password" id="password" class="form-control" type="password" name="password" required
                        autocomplete="new-password">
                </div>
                <div class="mb-2">
                    <label for="password_confirmation" class="form-label">Confirm Password<span
                            class="text-danger">*</span></label>
                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
@endsection
