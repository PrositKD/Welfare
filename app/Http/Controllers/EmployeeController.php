<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Apartment;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function collectPayment(Request $request)
    {
        $validatedData = $request->validate([
            'apartment_id' => 'required|exists:apartments,id',
            'employee_id' => 'required|exists:users,id',
        ]);

        // Create a new payment record
        Payment::create([
            'apartment_id' => $validatedData['apartment_id'],
            'employee_id' => $validatedData['employee_id'],
            'amount' => 200, // fixed amount
            'payment_date' => now(),
            'status' => 'collected',
        ]);

        return redirect()->back()->with('success', 'Payment collected successfully!');
    }
}
