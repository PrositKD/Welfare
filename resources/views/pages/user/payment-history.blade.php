@extends('layouts.app')
@section('title', 'Payment History')

@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Payment History</h5>
        </div>
        <div class="card-body">
            @if($payments->isEmpty())
                <p>No payment history found.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->created_at->format('Y-m-d') }}</td>
                                <td>{{ $payment->status == 1 ? 'Completed' : 'Pending' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection
