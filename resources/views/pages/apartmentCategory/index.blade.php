@extends('layouts.app')
@section('title', 'Apartment Category List')

@push('css')
@endpush

@section('content')

    <!--begin::Card Header-->
    <div class="card-header mb-3">
        <div class="row">
            <div class="col-6">
                <h1 class="h3 d-inline align-middle">Apartment Categories</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('apartment-category.create') }}" class="btn btn-success">
                    <i data-feather="plus-circle"></i> Add Apartment Category
                </a>
            </div>
        </div>
    </div>
    <!--end::Card Header-->

    <!--begin::Validation Message-->
    @include('include.validation-message')
    <!--end::Validation Message-->

    <!--begin::Card-->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">All Apartment Categories</h5>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th class="d-none d-xl-table-cell">Bill</th>
                        <th class="d-none d-xl-table-cell">Status</th>
                        <th>Created At</th>
                        <th class="d-none d-md-table-cell">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ ucwords($category->name) }}</td>
                            <td class="d-none d-xl-table-cell">{{ $category->bill }}</td>
                            <td>
                                @if($category->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="d-none d-md-table-cell">{{ $category->created_at->format('Y-m-d') }}</td>
                            <td class="d-none d-md-table-cell">
                                @if (auth()->user()->type == 'admin')
                                    <a href="{{ route('apartment-category.edit', $category->id) }}" class="btn btn-sm btn-primary actions mr-1">
                                        <i data-feather="edit"></i>
                                    </a>
                                    {{-- <a href="javascript:void(0)" data-route="{{ route('apartment-category.status_change', $category->id) }}" data-csrf="{{ csrf_token() }}" class="btn btn-sm {{ $category->status == 1 ? 'btn-danger' : 'btn-success' }} status-confirm mr-1">
                                        <i data-feather="refresh-cw"></i>
                                    </a> --}}
                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger delete-confirm" data-route="{{ route('apartment-category.destroy', $category->id) }}" data-csrf="{{ csrf_token() }}" title="Delete">
                                        <i data-feather="trash"></i>
                                    </a> 
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--end::Card-->

@endsection
