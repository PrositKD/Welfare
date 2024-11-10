@extends('layouts.app')
@section('title', 'Add Apartment Category')

@push('css')
@endpush

@section('content')

    <!--begin::Card Header-->
    <div class="card-header mb-3">
        <div class="row">
            <div class="col-6">
                <h1 class="h3 d-inline align-middle">Apartment Category Information</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('apartment-category.index') }}" class="btn btn-success">
                    <i data-feather="list"></i> Apartment Category List
                </a>
            </div>
        </div>
    </div>
    <!--end::Card Header-->

    <!--begin::Validation Message-->
    @include('include.validation-message')
    <!--end::Validation Message-->


    <div class="card">
        <form class="needs-validation" action="{{ route('apartment-category.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Category Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Category Name" required value="{{ old('name') }}">
                </div>
                <div class="mb-2">
                    <label for="bill" class="form-label">Bill<span class="text-danger">*</span></label>
                    <input type="number" name="bill" id="bill" class="form-control @error('bill') is-invalid @enderror" placeholder="Bill Amount" required value="{{ old('bill') }}">
                </div>
                <div class="mb-2">
                    <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                    <select class="form-select" name="status" required>
                        <option value="1" @selected(old('status') == 1)>Active</option>
                        <option value="0" @selected(old('status') == 0)>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Add Apartment Category</button>
            </div>
        </form>
    </div>

@endsection
