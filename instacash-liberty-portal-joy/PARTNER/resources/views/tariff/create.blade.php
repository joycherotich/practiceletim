<!-- resources/views/tariff/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Payment Cycle</h1>

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

        <form action="{{ route('tariff.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="payment_cycle_name">Payment Plan</label>
                <input type="text" name="payment_cycle_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" name="amount" class="form-control" required>
            </div>

            <!-- <div class="form-group">
                <label for="cycle_code">Cycle Code:</label>
                <input type="text" name="cycle_code" class="form-control" required>
            </div> -->

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Payment Cycle</button>
        </form>
    </div>
@endsection
