<!-- resources/views/customers/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background-color: #f4f1ea; padding: 20px; border-radius: 10px; border: 1px solid #d1a06d;">
    <h1 class="text-center" style="color: #6d4c41; font-family: 'Georgia', serif;">Detail Customer</h1>

    <!-- Card for customer details -->
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm" style="background-color: #f0e6d6; border-color: #b58e6d;">
            <div class="card-body">
                <h5 class="card-title" style="color: #6d4c41; font-family: 'Georgia', serif;">
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
