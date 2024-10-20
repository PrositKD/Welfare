@extends('layouts.app')
@section('title', 'Staff List')

@push('css')
@endpush
@section('content')

    <!--begin::Card Header-->
    <div class="card-header mb-3">
        <div class="row">
            <div class="col-6">
                <h1 class="h3 d-inline align-middle">Staff Section</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('staff.create')}}" class="btn btn-success">
                    <i data-feather="plus-circle"></i> Add Staff
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
            <h5 class="card-title">All Staff List here</h5>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="d-none d-xl-table-cell">Email</th>
                        <th class="d-none d-xl-table-cell">Type</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th class="d-none d-md-table-cell">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="bg-light rounded-2">
                                        <img class="p-2" src="{{$staff->profile_photo_path ? asset('upload/staffs/'.$staff->profile_photo_path) : asset('assets/img/avatar.jpg')}}" style="height:50px; width:50px">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-1">
                                    {{ucwords($staff->name)}}
                                </div>
                            </div>
                        </td>
                        <td class="d-none d-xl-table-cell">{{$staff->email}}</td>
                        <td class="d-none d-xl-table-cell">
                            @if($staff->type == 'admin')
                            <span class="badge bg-success">Admin</span>
                            @else
                            <span class="badge bg-primary">Employee</span>
                            @endif
                        </td>
                        
                        <td class="d-none d-md-table-cell">{{$staff->created_at->format('Y-m-d')}}</td>
                        <td>
                            @if($staff->status == 'active')
                            <span class="badge bg-success">Active</span>
                            @elseif($staff->status == 'block')
                            <span class="badge bg-danger">Blocked</span>
                            @else
                            <span class="badge bg-primary">Pending</span>
                            @endif
                        </td>
                        <td class="d-none d-md-table-cell">
                            @if (auth()->user()->type == 'admin')
                                <a href="{{route('staff.edit', $staff->id)}}" class="btn btn-sm btn-primary actions mr-1"><i data-feather="edit"></i></a>

                                <a href="javascript:void(0)" data-route="{{ route('staff.status_change', $staff->id) }}" data-csrf="{{ csrf_token() }}" class="btn btn-sm {{ $staff->status == 'active' || $staff->status == 'pending' ? 'btn-success' : 'btn-danger'}}  status-confirm mr-1">
                                    @if($staff->status == 'active' || $staff->status == 'pending')
                                    Block
                                    @elseif($staff->status == 'block')
                                    Unblock
                                    @endif
                                </a>

                                @if (Auth::user()->type == 'admin')
                                    @if($staff->status == 'pending')
                                        <a href="javascript:void(0)" class="btn btn-sm btn-success approve-confirm mr-1" title="Approve" data-route="{{ route('staff.approve', $staff->id) }}" data-csrf="{{ csrf_token() }}">Approve</a>
                                    @endif
                                @endif

                                <a href="javascript:void(0)" class="btn btn-sm btn-danger delete-confirm" data-route="{{route('staff.destroy', $staff->id)}}" data-csrf="{{csrf_token()}}" title="Delete">
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


