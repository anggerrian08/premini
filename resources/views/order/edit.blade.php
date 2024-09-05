@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Order</h1>

    <form action="{{ route('order.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer</label>
            <select class="form-control" id="customer_id" name="customer_id" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $customer->id == $order->customer_id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="karyawan_id" class="form-label">Karyawan</label>
            <select class="form-control" id="karyawan_id" name="karyawan_id" required>
                @foreach($karyawans as $karyawan)
                    <option value="{{ $karyawan->id }}" {{ $karyawan->id == $order->karyawan_id ? 'selected' : '' }}>{{ $karyawan->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="produk_ids" class="form-label">Produk</label>
            <select class="form-control" id="produk_ids" name="produk_ids[]" multiple required>
                @foreach($produks as $produk)
                    <option value="{{ $produk->id }}" {{ in_array($produk->id, $order->produk->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $produk->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="total_price" class="form-label">Total Harga</label>
            <input type="number" class="form-control" id="total_price" name="total_price" value="{{ $order->total_price }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $order->status }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
