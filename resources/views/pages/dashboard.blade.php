@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

    @if(auth()->user()->type == "admin")
        <div class="row">
            {{-- <div class="col-xl-6 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Total Leave Requests</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="file-text"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $totalRequests }}</h1>
                                    <div class="mb-0">
                                        <span class="{{ $totalRequestPercentageChange >= 0 ? 'text-success' : 'text-danger' }}">
                                            <i class="mdi mdi-arrow-bottom-right"></i> {{ number_format(abs($totalRequestPercentageChange), 2) }}%
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Pending Requests</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="clock"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $pendingRequests }}</h1>
                                    <div class="mb-0">
                                        <span class="{{ $pendingPercentageChange >= 0 ? 'text-success' : 'text-danger' }}">
                                            <i class="mdi mdi-arrow-bottom-right"></i> {{ number_format(abs($pendingPercentageChange), 2) }}%
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        {{-- <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Approved Requests</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="check-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $approvedRequests }}</h1>
                                    <div class="mb-0">
                                        <span class="{{ $approvedPercentageChange >= 0 ? 'text-success' : 'text-danger' }}">
                                            <i class="mdi mdi-arrow-bottom-right"></i> {{ number_format(abs($approvedPercentageChange), 2) }}%
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Rejected Requests</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="x-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $rejectedRequests }}</h1>
                                    
                                    <div class="mb-0">
                                        <span class="{{ $rejectedPercentageChange >= 0 ? 'text-success' : 'text-danger' }}">
                                            <i class="mdi mdi-arrow-bottom-right"></i> {{ number_format(abs($rejectedPercentageChange), 2) }}%
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    
                </div>
            </div> --}}

            {{-- <div class="col-xl-6 col-xxl-7">
                <div class="card flex-fill w-100">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Leave Requests</h5>
                    </div>
                    <div class="card-body py-3">
                        <div class="chart chart-sm">
                            <canvas id="chartjs-dashboard-line"></canvas>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        {{-- <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Latest Leave Request</h5>
            </div>
            <table class="table table-borderless my-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Leave Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total Days</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latestLeaveRequests as $latestLeaveRequest)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="bg-light rounded-2">
                                            <img class="p-2" src="{{$latestLeaveRequest->user?->profile_photo_path ? asset('upload/staffs/'.$latestLeaveRequest->user?->profile_photo_path) : asset('assets/img/avatar.jpg')}}" style="height:50px; width:50px">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-1">
                                        {{ucwords($latestLeaveRequest->user?->name)}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <strong>
                                    @if($latestLeaveRequest->leave_type == 1)
                                    <span class="badge bg-success">Casual Leave</span>
                                    @elseif($latestLeaveRequest->leave_type == 2)
                                    <span class="badge bg-danger">Sick Leave</span>
                                    @elseif($latestLeaveRequest->leave_type == 3)
                                    <span class="badge bg-primary">Emergency Leave</span>
                                    @endif
                                </strong>
                            </td>
                            <td>{{$latestLeaveRequest->start_date}}</td>
                            <td>{{$latestLeaveRequest->end_date}}</td>
                            <td>
                                @php
                                    $startDate = \Carbon\Carbon::createFromFormat('Y-m-d', $latestLeaveRequest->start_date);
                                    $endDate = \Carbon\Carbon::createFromFormat('Y-m-d', $latestLeaveRequest->end_date);
                                    $totalDaysCount = abs($endDate->diffInDays($startDate)) + 1;
                                @endphp
                                {{$totalDaysCount}}
                            </td>
                            <td>
                                @if($latestLeaveRequest->status == 'approve')
                                <span class="badge bg-success">Approved</span>
                                @elseif($latestLeaveRequest->status == 'cancel')
                                <span class="badge bg-danger">Canceled</span>
                                @else
                                <span class="badge bg-primary">Pending</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}
    @endif

    <!-- For User Wise Data -->
    @if(auth()->user()->type == "user")
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    <div class="alert-message">
                        <h4 class="alert-heading">Welcome! {{ucwords(auth()->user()->name)}}</h4>
                        <h6>You have successfully logged in. Welcome back!</h6>
                        <h6>Everything here is based on the data you gave. So, all the info you see is directly from what you provided.</h6>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-xl-6 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Total Leave Requests</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="file-text"></i>
                                            </div>
                                        </div>
                                    </div>
                                    


                                    <h1 class="mt-1 mb-3">{{ $userWiseTotalRequests }}</h1>
                                    <div class="mb-0">
                                        <span class="{{ $userWiseTotalRequestPercentageChange >= 0 ? 'text-success' : 'text-danger' }}">
                                            <i class="mdi mdi-arrow-bottom-right"></i> {{ number_format(abs($userWiseTotalRequestPercentageChange), 2) }}%
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Pending Requests</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="clock"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $userWisePendingRequests }}</h1>
                                    <div class="mb-0">
                                        <span class="{{ $userWisePendingPercentageChange >= 0 ? 'text-success' : 'text-danger' }}">
                                            <i class="mdi mdi-arrow-bottom-right"></i> {{ number_format(abs($userWisePendingPercentageChange), 2) }}%
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Approved Requests</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="check-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $userWiseApprovedRequests }}</h1>
                                    <div class="mb-0">
                                        <span class="{{ $userWiseApprovedPercentageChange >= 0 ? 'text-success' : 'text-danger' }}">
                                            <i class="mdi mdi-arrow-bottom-right"></i> {{ number_format(abs($userWiseApprovedPercentageChange), 2) }}%
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Rejected Requests</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="x-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $userWiseRejectedRequests }}</h1>
                                    
                                    <div class="mb-0">
                                        <span class="{{ $userWiseRejectedPercentageChange >= 0 ? 'text-success' : 'text-danger' }}">
                                            <i class="mdi mdi-arrow-bottom-right"></i> {{ number_format(abs($userWiseRejectedPercentageChange), 2) }}%
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="col-xl-6 col-xxl-7">
                <div class="card flex-fill w-100">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Leave Requests</h5>
                    </div>
                    <div class="card-body py-3">
                        <div class="chart chart-sm">
                            <canvas id="user-wise-chartjs-dashboard-line"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    @endif
@endsection

@push('scripts')
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fetch the dynamic data from the backend
            fetch('{{ route("getLeaveRequestsData") }}')
                .then(response => response.json())
                .then(data => {
                    var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
                    var gradientLight = ctx.createLinearGradient(0, 0, 0, 225);
                    gradientLight.addColorStop(0, "rgba(215, 227, 244, 1)");
                    gradientLight.addColorStop(1, "rgba(215, 227, 244, 0)");
                    var gradientDark = ctx.createLinearGradient(0, 0, 0, 225);
                    gradientDark.addColorStop(0, "rgba(51, 66, 84, 1)");
                    gradientDark.addColorStop(1, "rgba(51, 66, 84, 0)");

                    // Line chart
                    new Chart(document.getElementById("chartjs-dashboard-line"), {
                        type: "line",
                        data: {
                            labels: data.months, // Use dynamic months
                            datasets: [{
                                label: "Leave Requests",
                                fill: true,
                                backgroundColor: window.theme.id === "light" ? gradientLight : gradientDark,
                                borderColor: window.theme.primary,
                                data: data.leaveRequestsData
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            legend: {
                                display: false
                            },
                            tooltips: {
                                intersect: false
                            },
                            hover: {
                                intersect: true
                            },
                            plugins: {
                                filler: {
                                    propagate: false
                                }
                            },
                            scales: {
                                xAxes: [{
                                    reverse: true,
                                    gridLines: {
                                        color: "rgba(0,0,0,0.0)"
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        stepSize: 1000
                                    },
                                    display: true,
                                    borderDash: [3, 3],
                                    gridLines: {
                                        color: "rgba(0,0,0,0.0)",
                                        fontColor: "#fff"
                                    }
                                }]
                            }
                        }
                    });
                });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Fetch the dynamic data from the backend
            $.getJSON('{{ route("userWiseGetLeaveRequestsData") }}', function(data) {
                var ctx = $("#user-wise-chartjs-dashboard-line");
                var gradientLight = ctx[0].getContext("2d").createLinearGradient(0, 0, 0, 225);
                gradientLight.addColorStop(0, "rgba(215, 227, 244, 1)");
                gradientLight.addColorStop(1, "rgba(215, 227, 244, 0)");
                var gradientDark = ctx[0].getContext("2d").createLinearGradient(0, 0, 0, 225);
                gradientDark.addColorStop(0, "rgba(51, 66, 84, 1)");
                gradientDark.addColorStop(1, "rgba(51, 66, 84, 0)");

                // Line chart
                new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: data.months, // Use dynamic months
                        datasets: [{
                            label: "User Wise Leave Requests",
                            fill: true,
                            backgroundColor: window.theme.id === "light" ? gradientLight : gradientDark,
                            borderColor: window.theme.primary,
                            data: data.userWiseLeaveRequestsData
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        tooltips: {
                            intersect: false
                        },
                        hover: {
                            intersect: true
                        },
                        plugins: {
                            filler: {
                                propagate: false
                            }
                        },
                        scales: {
                            xAxes: [{
                                reverse: true,
                                gridLines: {
                                    color: "rgba(0,0,0,0.0)"
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    stepSize: 1000
                                },
                                display: true,
                                borderDash: [3, 3],
                                gridLines: {
                                    color: "rgba(0,0,0,0.0)",
                                    fontColor: "#fff"
                                }
                            }]
                        }
                    }
                });
            });
        });

    </script> --}}
@endpush

