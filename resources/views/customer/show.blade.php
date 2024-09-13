<!-- resources/views/customers/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Customer</h1>

    <!-- Card for customer details -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <h5 class="card-title">Customer Details</h5>

            <div class="card-body">
                <strong>Nama:</strong> {{ $customer->name }}
            </div>
            <div class="card-body">
                <strong>Email:</strong> {{ $customer->email }}
            </div>
            <div class="card-body">
                <strong>Telepon:</strong> {{ $customer->phone }}
            </div>
            <div class="card-body">
                <strong>Alamat:</strong> {{ $customer->address }}
            </div>

            <a href="{{ route('customer.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
