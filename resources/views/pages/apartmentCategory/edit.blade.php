@extends('layouts.app')
@section('title', 'Update Apartment Category')

@push('css')
@endpush

@section('content')

    <!--begin::Card Header-->
    <div class="card-header mb-3">
        <div class="row">
            <div class="col-6">
                <h1 class="h3 d-inline align-middle">Update Apartment Category Information</h1>
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
        <form class="needs-validation" action="{{ route('apartment-category.update', $category->id) }}" method="POST">
            @csrf
            @method('POST') <!-- Use POST method for update -->
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Category Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Category Name" required value="{{ old('name', $category->name) }}">
                </div>
                <div class="mb-2">
                    <label for="bill" class="form-label">Bill Amount<span class="text-danger">*</span></label>
                    <input type="number" name="bill" id="bill" class="form-control" placeholder="Bill Amount" required value="{{ old('bill', $category->bill) }}">
                </div>
                <div class="mb-2">
                    <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="1" @selected($category->status == 1)>Active</option>
                        <option value="0" @selected($category->status == 0)>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>

@endsection