<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Apartment;
use App\Models\Building;
use App\Models\MonthlyPayment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Show the Collect Payment Form
    public function showCollectPaymentForm()
    {//dd(auth()->id());
        $user = auth()->user();

        // Get the roads assigned to this staff member
        $staffRoads =  $user->roadstaf()->orderBy('road_no')->get();
       
        return view('pages.user.collect-payment', compact('staffRoads'));
    }
    public function getBuildingsByRoad(Request $request)
    {
        $roadId = $request->input('road_id');

        $buildings = Building::where('road_id', $roadId)->get();
        return response()->json($buildings);
    }
    // public function getApartmentsByBuilding(Request $request)
    // {  
    //     $apartments = Apartment::with('category') // Eager load the related category
    //                             ->where('building_id', $request->building_id)
    //                             ->get();
        
    //     return response()->json([
    //         'apartments' => $apartments
    //     ]);
    // }
    public function getApartmentsByBuilding(Request $request)
    {
        $Month = $request->input('month', now()->format('m'));
        $Year = $request->input('year', now()->year);
    
        $monthColumn = "month_" . str_pad($Month, 2, '0', STR_PAD_LEFT);
    
        $apartments = Apartment::with('category')
            ->leftJoin('monthlypayment', function ($join) use ($Year, $monthColumn) {
                $join->on('apartments.id', '=', 'monthlypayment.apartment_id')
                     ->where('monthlypayment.year', $Year);
            })
            ->where('building_id', $request->building_id)
            ->select(
                'apartments.*',
                DB::raw("IFNULL(monthlypayment.$monthColumn, 0) as month_payment")
            )
            ->get();
    
        return response()->json([
            'apartments' => $apartments
        ]);
    }
    

    
 
// public function collectPayment(Request $request)
// {
//     // Validate the incoming data
//     $validatedData = $request->validate([
//         'apartment_id' => 'required|exists:apartments,id', // Ensure apartment exists
//         'amount' => 'required|numeric' // Ensure amount is a valid number
//     ]);

//     // Create a new payment record with the provided amount
//     Payment::create([
//         'apartment_id' => $validatedData['apartment_id'],
//         'employee_id' => auth()->id(),  // Get the ID of the currently logged-in user
//         'amount' => $validatedData['amount'], // Amount from the form
//         'payment_date' => now(),
//         'status' => 'collected', // Fixed status
//     ]);

//     // Redirect back with a success message
//     return redirect()->route('user.collect-payment')->with('success', 'Payment collected successfully!');
// }

public function collectPayment(Request $request)
{
    $apartmentIds = json_decode($request->input('apartment_ids'), true); // Decode into an array
    $amounts = json_decode($request->input('amounts'), true); // Decode into an array
    $currentMonth = $request->input('month');
    $currentYear = $request->input('year');
    
     //dd($apartmentIds, $amounts); // Check the structure

    // Loop through each apartment id and amount
    foreach ($apartmentIds as $index => $apartmentId) {
        $apartmentId = (int) $apartmentId; 
        $amount = $amounts[$index];
        $amount = number_format((float)$amount, 2, '.', ''); // Format to 2 decimal places

        // Record payment for each apartment
        Payment::create([
            'apartment_id' => $apartmentId,  // Store the single apartment ID as integer
            'employee_id' => auth()->id(),
            'amount' => $amount,  // Store the formatted amount
            'payment_date' => now(),
            'status' => 'collected'
        ]);

        // Update or create monthly payment record for the apartment
        $monthlyPayment = MonthlyPayment::firstOrCreate(
            ['apartment_id' => $apartmentId, 'year' => $currentYear],
            [
                'month_01' => 0, 'month_02' => 0, 'month_03' => 0,
                'month_04' => 0, 'month_05' => 0, 'month_06' => 0,
                'month_07' => 0, 'month_08' => 0, 'month_09' => 0,
                'month_10' => 0, 'month_11' => 0, 'month_12' => 0,
            ]
        );

        // Get the correct column for the selected month
        $monthColumn = 'month_' . str_pad($currentMonth, 2, '0', STR_PAD_LEFT);

        // Add the amount to the correct month
        $monthlyPayment->$monthColumn += $amount;
        $monthlyPayment->save();
    }

    // Redirect with success message
    return redirect()->route('user.collect-payment')->with('success', 'Payments collected and monthly records updated successfully for selected apartments!');
}



    // Method to view the collection report
    public function collectionReport()
    {
        // Get all collected payments (or you can customize the query as needed)
        $payments = Payment::with(['apartment', 'employee']) // Eager load related models
            ->where('status', 'collected') // Filter payments by collected status
            ->get();

        // Return the collection report view with the payments data
        return view('employee.collection-report', compact('payments'));
    }
}

