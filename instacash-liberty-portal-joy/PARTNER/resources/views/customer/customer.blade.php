<!-- resources/views/customers/customer.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="customer-details-container">
        <h1>Customer Details</h1>

        {{-- Display customer information --}}
        <div class="customer-details">
            <p><strong>ID:</strong> {{ $customer->id }}</p>
            <p><strong>Full Name:</strong> {{ $customer->full_name }}</p>
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Phone Number:</strong> {{ $customer->phone_number }}</p>
            <p><strong>ID Number:</strong> {{ $customer->id_number }}</p>
        </div>

        <hr>

        <a href="{{ route('customers.index') }}" class="back-link">Back to Customers</a>
    </div>
@endsection

@push('styles')
    <style>
        /* Add your custom styles here */
        .customer-details-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .customer-details {
            margin-bottom: 20px;
        }

        .back-link {
            display: inline-block;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-link:hover {
            background-color: #0056b3;
        }
    </style>
@endpush
