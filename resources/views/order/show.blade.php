@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Order</h1>

    <div class="mb-3">
        <label for="customer_name" class="form-label">Customer</label>
        <input type="text" class="form-control" id="customer_name" value="{{ $order->customer->name }}" readonly>
    </div>

    <div class="mb-3">
        <label for="karyawan_name" class="form-label">Karyawan</label>
        <input type="text" class="form-control" id="karyawan_name" value="{{ $order->karyawan->name }}" readonly>
    </div>

    <div class="mb-3">
        <label for="produk_names" class="form-label">Produk</label>
        <ul>
            @foreach($order->produk as $produk)
                <li>{{ $produk->name }}</li>
            @endforeach
        </ul>
    </div>

    <div class="mb-3">
        <label for="total_price" class="form-label">Total Harga</label>
        <input type="text" class="form-control" id="total_price" value="{{ $order->total_price }}" readonly>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control" id="status" value="{{ $order->status }}" readonly>
    </div>

    <a href="{{ route('order.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
