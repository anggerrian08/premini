<!-- resources/views/customers/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Customer</h1>

    <div class="mb-3">
        <strong>Nama:</strong> {{ $customer->name }}
    </div>
    <div class="mb-3">
        <strong>Email:</strong> {{ $customer->email }}
    </div>
    <div class="mb-3">
        <strong>Telepon:</strong> {{ $customer->phone }}
    </div>
    <div class="mb-3">
        <strong>Alamat:</strong> {{ $customer->address }}
    </div>

    <a href="{{ route('customer.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
