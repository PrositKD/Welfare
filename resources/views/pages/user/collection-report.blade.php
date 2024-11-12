<!-- resources/views/employee/collection-report.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Collection Report</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Apartment</th>
                <th>Employee</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->apartment->name ?? 'N/A' }}</td> <!-- Display apartment name -->
                    <td>{{ $payment->employee->name ?? 'N/A' }}</td> <!-- Display employee name -->
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->payment_date->format('Y-m-d H:i') }}</td> <!-- Format payment date -->
                    <td>{{ $payment->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
