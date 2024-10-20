<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();

        // $totalRequests = LeaveRequest::count();
        // $previousWeekTotalRequests = LeaveRequest::whereBetween('created_at', [Carbon::now()->startOfWeek()->subWeek(), Carbon::now()->endOfWeek()->subWeek()])->count();
        // $totalRequestPercentageChange = $previousWeekTotalRequests != 0 ? (($totalRequests - $previousWeekTotalRequests) / $previousWeekTotalRequests) * 100 : 0;


        // $pendingRequests = LeaveRequest::where('status', 'pending')->count();
        // $previousWeekPendingRequests = LeaveRequest::where('status', 'pending')->whereBetween('created_at', [Carbon::now()->startOfWeek()->subWeek(), Carbon::now()->endOfWeek()->subWeek()])->count();
        // $pendingPercentageChange = $previousWeekPendingRequests != 0 ? (($pendingRequests - $previousWeekPendingRequests) / $previousWeekPendingRequests) * 100 : 0;
        

        // $approvedRequests = LeaveRequest::where('status', 'approved')->count();
        // $previousWeekApprovedRequests = LeaveRequest::where('status', 'approved')->whereBetween('created_at', [Carbon::now()->startOfWeek()->subWeek(), Carbon::now()->endOfWeek()->subWeek()])->count();
        // $approvedPercentageChange = $previousWeekApprovedRequests != 0 ? (($approvedRequests - $previousWeekApprovedRequests) / $previousWeekApprovedRequests) * 100 : 0;

        
        // $rejectedRequests = LeaveRequest::where('status', 'rejected')->count();
        // $previousWeekRejectedRequests = LeaveRequest::where('status', 'rejected')->whereBetween('created_at', [Carbon::now()->startOfWeek()->subWeek(), Carbon::now()->endOfWeek()->subWeek()])->count();
        // $rejectedPercentageChange = $previousWeekRejectedRequests != 0 ? (($rejectedRequests - $previousWeekRejectedRequests) / $previousWeekRejectedRequests) * 100 : 0;

        // $latestLeaveRequests = LeaveRequest::latest()->take(5)->get();


        // // For Authentic User
        // $userWiseTotalRequests = LeaveRequest::where('user_id', $userId)->count();
        // $userWisePreviousWeekTotalRequests = LeaveRequest::where('user_id', $userId)->whereBetween('created_at', [Carbon::now()->startOfWeek()->subWeek(), Carbon::now()->endOfWeek()->subWeek()])->count();
        // $userWiseTotalRequestPercentageChange = $userWisePreviousWeekTotalRequests != 0 ? (($userWiseTotalRequests - $userWisePreviousWeekTotalRequests) / $userWisePreviousWeekTotalRequests) * 100 : 0;


        // $userWisePendingRequests = LeaveRequest::where('user_id', $userId)->where('status', 'pending')->count();
        // $userWisePreviousWeekPendingRequests = LeaveRequest::where('user_id', $userId)->where('status', 'pending')->whereBetween('created_at', [Carbon::now()->startOfWeek()->subWeek(), Carbon::now()->endOfWeek()->subWeek()])->count();
        // $userWisePendingPercentageChange = $userWisePreviousWeekPendingRequests != 0 ? (($userWisePendingRequests - $userWisePreviousWeekPendingRequests) / $userWisePreviousWeekPendingRequests) * 100 : 0;
        

        // $userWiseApprovedRequests = LeaveRequest::where('user_id', $userId)->where('status', 'approved')->count();
        // $userWisePreviousWeekApprovedRequests = LeaveRequest::where('user_id', $userId)->where('status', 'approved')->whereBetween('created_at', [Carbon::now()->startOfWeek()->subWeek(), Carbon::now()->endOfWeek()->subWeek()])->count();
        // $userWiseApprovedPercentageChange = $userWisePreviousWeekApprovedRequests != 0 ? (($userWiseApprovedRequests - $userWisePreviousWeekApprovedRequests) / $userWisePreviousWeekApprovedRequests) * 100 : 0;

        
        // $userWiseRejectedRequests = LeaveRequest::where('user_id', $userId)->where('status', 'rejected')->count();
        // $userWisePreviousWeekRejectedRequests = LeaveRequest::where('user_id', $userId)->where('status', 'rejected')->whereBetween('created_at', [Carbon::now()->startOfWeek()->subWeek(), Carbon::now()->endOfWeek()->subWeek()])->count();
        // $userWiseRejectedPercentageChange = $userWisePreviousWeekRejectedRequests != 0 ? (($userWiseRejectedRequests - $userWisePreviousWeekRejectedRequests) / $userWisePreviousWeekRejectedRequests) * 100 : 0;

        // $userWiseLatestLeaveRequests = LeaveRequest::where('user_id', $userId)->latest()->take(5)->get();


        

        return view('pages.dashboard');
    }

    // public function getLeaveRequestsData()
    // {
    //     $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        
    //     $leaveRequestsData = [];
    //     foreach ($months as $month) {
    //         $leaveRequestsCount = LeaveRequest::whereMonth('created_at', Carbon::parse($month)->month)->count();
    //         $leaveRequestsData[] = $leaveRequestsCount;
    //     }

    //     return response()->json(compact('months', 'leaveRequestsData'));
    // }
    // public function userWiseGetLeaveRequestsData()
    // {
    //     $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        
    //     $userWiseLeaveRequestsData = [];
    //     foreach ($months as $month) {
    //         $leaveRequestsCount = LeaveRequest::where('user_id', Auth::id())->whereMonth('created_at', Carbon::parse($month)->month)->count();
    //         $userWiseLeaveRequestsData[] = $leaveRequestsCount;
    //     }

    //     return response()->json(compact('months', 'userWiseLeaveRequestsData'));
    // }

}
