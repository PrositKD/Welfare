@extends('layouts.app')
@section('title', 'Profile')

@push('css')
    <link rel="stylesheet" href="{{asset('assets/css/image-preview.css')}}">
@endpush

@section('content')
    <h1 class="h3 mb-3"><strong>Profile</strong> Information</h1>

    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Profile Details</h5>
                </div>
                <div class="card-body text-center">
                    <img src="{{$user->profile_photo_path ? asset('upload/staffs/'.$user->profile_photo_path) : asset('assets/img/avatar.jpg')}}" alt="{{$user->name}}" class="rounded-circle mb-3" width="200" height="200">
                    <h5 class="card-title mb-0">{{$user->name}}</h5>
                    <div class="text-muted mb-3">{{$user->type == 1 ? 'Admin' : 'Employee'}}</div>

                    <div>
                        <a class="btn btn-primary btn-sm" href="#">Follow</a>
                        <a class="btn btn-primary btn-sm" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> Message</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-xl-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Update Your Information</h5>
                </div>
                <div class="card-body h-100">
                        <!--begin::Validation Message-->
                        @include('include.validation-message')
                        <!--end::Validation Message-->
                    <form class="needs-validation" action="{{route('profile.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Your Name" name="name" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-form-label col-sm-2">Profile Picture</label>
                            <div class="col-sm-10">
                                <div class="basic-image-upload">
                                    <div class="image-edit">
                                        <input type='file' name="profile_photo_path" id="basic-image" accept=".png, .jpg, .jpeg" />
                                        <label for="basic-image">
                                            <i data-feather="edit"></i>
                                        </label>
                                    </div>
                                    <div class="image-preview">
                                        <div id="image-preview"
                                            style="background-image: url({{ $user->profile_photo_path ? asset('upload/staffs/' . $user->profile_photo_path) : asset('assets/img/avatar.jpg') }});"
                                            class="img-fluid img-thumbnail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h5>Leave Password blank if you do not want to change</h5>
                        
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2">Password</label>
                            <div class="col-sm-10">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Password" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-10 ms-sm-auto">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush