@extends('layouts.app')
@section('title', 'Update Apartment')

@push('css')
@endpush

@section('content')

    <!--begin::Card Header-->
    <div class="card-header mb-3">
        <div class="row">
            <div class="col-6">
                <h1 class="h3 d-inline align-middle">Update Apartment Information</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('apartment.index')}}" class="btn btn-success">
                    <i data-feather="list"></i> Apartment List
                </a>
            </div>
        </div>
    </div>
    <!--end::Card Header-->

    <!--begin::Validation Message-->
    @include('include.validation-message')
    <!--end::Validation Message-->


    <div class="card">
        <form class="needs-validation" action="{{route('apartment.update', $apartment->id)}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Building Name<span class="text-danger">*</span></label>
                    <select class="form-select" name="building_id">
                        <option value="">Select One</option>
                        @foreach ($buildings as $building)
                            <option value="{{$building->id}}" @selected($apartment->building_id == $building->id)>{{ucwords($building->name)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category<span class="text-danger">*</span></label>
                    <select class="form-select" name="category_id" required>
                        <option value="">Select One</option>
                        @foreach ($categorys as $category)
                            <option value="{{ $category->id }}" @selected($apartment->category_id == $category->id)>{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="apartment_number" class="form-label">Apartment No<span class="text-danger">*</span></label>
                    <input type="text" name="apartment_number" id="apartment_number" class="form-control" placeholder="Apartment No" required value="{{$apartment->apartment_number}}">
                </div>
                <div class="mb-2">
                    <label for="owner_name" class="form-label">Owner Name<span class="text-danger">*</span></label>
                    <input type="text" name="owner_name" id="owner_name" class="form-control" placeholder="Owner Name" required value="{{$apartment->owner_name}}">
                </div>
                <div class="mb-2">
                    <label for="mobile_no" class="form-label">Mobile No<span class="text-danger">*</span></label>
                    <input type="text" id="mobile_no" class="form-control" placeholder="Mobile No" name="mobile_no" required value="{{$apartment->mobile_no}}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection
