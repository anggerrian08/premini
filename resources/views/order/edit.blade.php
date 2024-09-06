@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pesanan</h1>

    <form action="{{ route('order.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Customer -->
        <div class="mb-3">
            <label for="customer_id" class="form-label">Pembeli</label>
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
        <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z"/>
          </svg> Simpan</button>
    </form>
</div>
@endsection
