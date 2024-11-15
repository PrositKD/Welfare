@extends('layouts.app')
@section('title', 'Building List')

@push('css')
@endpush
@section('content')

    <!--begin::Card Header-->
    <div class="card-header mb-3">
        <div class="row">
            <div class="col-6">
                <h1 class="h3 d-inline align-middle">Building Section</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('building.create')}}" class="btn btn-success">
                    <i data-feather="plus-circle"></i> Add Building
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
            <h5 class="card-title">All Building List here</h5>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="d-none d-xl-table-cell">Road</th>
                        {{-- <th class="d-none d-xl-table-cell">Total Appertment</th> --}}
                        <th class="d-none d-xl-table-cell">Contact Person</th>
                        <th class="d-none d-xl-table-cell">Mobile No</th>
                        <th>Status</th>
                        <th class="d-none d-md-table-cell">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buildings as $building)
                    <tr>
                        <td>{{$building->name}}</td>
                        <td class="d-none d-xl-table-cell">{{$building->road?->road_no}}{{ $building->road?->road_no ? '/' . $building->road?->block : '' }}</td>
                        {{-- <td class="d-none d-xl-table-cell">{{$building->total_apartment}}</td> --}}
                        <td class="d-none d-xl-table-cell">{{$building->contact_person}}</td>
                        <td class="d-none d-xl-table-cell">{{$building->mobile_no}}</td>
                        <td>
                            @if($building->status == 1)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td class="d-none d-md-table-cell">
                            @if (auth()->user()->type == 'admin')
                                <a href="{{route('building.edit', $building->id)}}" class="btn btn-sm btn-primary actions mr-1"><i data-feather="edit"></i></a>

                                <a href="javascript:void(0)" data-route="{{ route('building.status_change', $building->id) }}" data-csrf="{{ csrf_token() }}" class="btn btn-sm {{ $building->status == 1 ? 'btn-danger' : 'btn-success'}} status-confirm mr-1">
                                    <i data-feather="refresh-cw"></i>
                                </a>

                                <a href="javascript:void(0)" class="btn btn-sm btn-danger delete-confirm" data-route="{{route('building.destroy', $building->id)}}" data-csrf="{{csrf_token()}}" title="Delete">
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


