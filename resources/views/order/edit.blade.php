@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Order</h1>

    <form action="{{ route('order.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Customer -->
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer</label>
            <select class="form-control @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $customer->id == $order->customer_id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
            @error('customer_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Karyawan -->
        <div class="mb-3">
            <label for="karyawan_id" class="form-label">Karyawan</label>
            <select class="form-control @error('karyawan_id') is-invalid @enderror" id="karyawan_id" name="karyawan_id" required>
                @foreach($karyawans as $karyawan)
                    <option value="{{ $karyawan->id }}" {{ $karyawan->id == $order->karyawan_id ? 'selected' : '' }}>{{ $karyawan->name }}</option>
                @endforeach
            </select>
            @error('karyawan_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Total Harga -->
        <div class="mb-3">
            <label for="total_price" class="form-label">Total Harga</label>
            <input type="number" class="form-control @error('total_price') is-invalid @enderror" id="total_price" name="total_price" value="{{ old('total_price', $order->total_price) }}" required>
            @error('total_price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Status Order (Opsional jika ada) -->


        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
