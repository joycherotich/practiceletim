<!-- resources/views/tariff/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Payment Plan</h1>

        <!-- Display success message if set -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('tariff.create') }}" class="btn btn-primary">Create Payment plan</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Payment Premium</th>
                    <th>Amount</th>
                    <th>Status</th>
<!-- 
                    <th>Approval Status</th> -->
                    <th>Action</th>
                
           
                </tr>
            </thead>
            <tbody>
                @forelse($paymentCycles as $paymentCycle)
                    <tr>
                      
                        <td>{{ $paymentCycle->payment_cycle_name }}</td>
                        <td>{{ $paymentCycle->amount }}</td>

                        <td>{{ $paymentCycle->status ? 'Active' : 'Inactive' }}</td>
                        <!-- <td>{{ $paymentCycle->approval_status ? 'Approved' : 'Pending Approval' }}</td> -->
                  
                        <td>

                        <!-- @if (!$paymentCycle->approval_status)
                        <a href="{{ route('tariff.approve', $paymentCycle->id) }}" class="btn btn-sm btn-success">Approve</a>
                    @endif -->
                            <a href="{{ route('tariff.edit', $paymentCycle->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('tariff.destroy', $paymentCycle->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <!-- @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button> -->
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No payment cycles found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

