@extends('layouts.app')
@section('title', 'Apartment List')

@push('css')
@endpush
@section('content')

    <!--begin::Card Header-->
    <div class="card-header mb-3">
        <div class="row">
            <div class="col-6">
                <h1 class="h3 d-inline align-middle">Apartment Section</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('apartment.create')}}" class="btn btn-success">
                    <i data-feather="plus-circle"></i> Add Apartment
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
            <h5 class="card-title">All Apartment List here</h5>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Building Name</th>
                        <th class="d-none d-xl-table-cell">Apartment No</th>
                        <th class="d-none d-xl-table-cell">Owner Name</th>
                        <th class="d-none d-xl-table-cell">Mobile No</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th class="d-none d-md-table-cell">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apartments as $apartment)
                        <tr>
                            <td>{{ ucwords($apartment->building->name) }}</td>
                            <td class="d-none d-xl-table-cell">{{ $apartment->apartment_number }}</td>
                            <td class="d-none d-xl-table-cell">{{ ucwords($apartment->owner_name) }}</td>
                            <td class="d-none d-xl-table-cell">{{ $apartment->mobile_no }}</td>
                            <td class="d-none d-md-table-cell">{{ $apartment->created_at->format('Y-m-d') }}</td>
                            <td>
                                @if($apartment->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="d-none d-md-table-cell">
                                @if (auth()->user()->type == 'admin')
                                    <a href="{{ route('apartment.edit', $apartment->id) }}" class="btn btn-sm btn-primary actions mr-1">
                                        <i data-feather="edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-route="{{ route('apartment.status_change', $apartment->id) }}" data-csrf="{{ csrf_token() }}" class="btn btn-sm {{ $apartment->status == 1 ? 'btn-danger' : 'btn-success' }} status-confirm mr-1">
                                        <i data-feather="refresh-cw"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger delete-confirm" data-route="{{ route('apartment.destroy', $apartment->id) }}" data-csrf="{{ csrf_token() }}" title="Delete">
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


