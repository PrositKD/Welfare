@extends('layouts.app')
@section('title', 'Add Building')

@push('css')
@endpush

@section('content')

    <!--begin::Card Header-->
    <div class="card-header mb-3">
        <div class="row">
            <div class="col-6">
                <h1 class="h3 d-inline align-middle">Building Information</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('building.index') }}" class="btn btn-success">
                    <i data-feather="list"></i> Building List
                </a>
            </div>
        </div>
    </div>
    <!--end::Card Header-->

    <!--begin::Validation Message-->
    @include('include.validation-message')
    <!--end::Validation Message-->


    <div class="card">
        <form class="needs-validation" action="{{ route('building.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-2">
                    <label for="name" class="form-label">Building Name<span class="text-danger">*</span></label>
                    <input type="text" id="name" class="form-control" placeholder="Building Name" name="name"
                        required value="{{old('name')}}">
                </div>
                <div class="mb-2">
                    <label for="road" class="form-label">Road No<span class="text-danger">*</span></label>
                    <select class="form-select basic-single" name="road_id" required>
                        <option value="">Select One</option>
                        @foreach ($roads as $road)
                            <option value="{{ $road->id }}">{{ $road->road_no }}{{ $road->block ? '/' . $road->block : '' }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="contact_person" class="form-label">Contact Person Name<span class="text-danger">*</span></label>
                    <input type="text" name="contact_person" id="contact_person" class="form-control" placeholder="Contact Person Name" required value="{{old('contact_person')}}">
                </div>
                <div class="mb-2">
                    <label for="mobile_no" class="form-label">Mobile No<span class="text-danger">*</span></label>
                    <input type="text" id="mobile_no" class="form-control" placeholder="Mobile No" name="mobile_no" required value="{{old('mobile_no')}}">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Add Building</button>
            </div>
        </form>
    </div>
@endsection
