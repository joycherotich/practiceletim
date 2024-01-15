@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Payment Cycle</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('tariff.update', $paymentCycle->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="payment_cycle_name">Payment plan:</label>
                <input type="text" id="payment_cycle_name" name="payment_cycle_name" class="form-control" value="{{ $paymentCycle->payment_cycle_name }}" required>
            </div>

            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" class="form-control" value="{{ $paymentCycle->amount }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="1" {{ $paymentCycle->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $paymentCycle->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Payment Cycle</button>
        </form>
    </div>
@endsection
