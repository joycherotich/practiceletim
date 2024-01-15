

@section('content')
    <div class="payment-cycle-details-container">
        <h1>Payment Cycle Details</h1>

        {{-- Display payment cycle information --}}
        <div class="payment-cycle-details">
            <p><strong>ID:</strong> {{ $paymentCycle->id }}</p>
            <p><strong>Name:</strong> {{ $paymentCycle->cycle_name }}</p>
            <p><strong>Amount:</strong> ${{ $paymentCycle->cycle_amount }}</p>
            <p><strong>Code:</strong> {{ $paymentCycle->cycle_code }}</p>
           
        </div>

        <hr>

        <a href="{{ route('payment-cycles.index') }}" class="back-link">Back to Payment Cycles</a>
    </div>
@endsection

@push('styles')
    <style>
       
        .payment-cycle-details-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .payment-cycle-details {
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
