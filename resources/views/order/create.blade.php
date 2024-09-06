@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Order</h1>

    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer</label>
            <select class="form-control @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id" >
                <option value="" disabled selected>Pilih Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
            @error('customer_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="karyawan_id" class="form-label">Karyawan</label>
            <select class="form-control @error('karyawan_id') is-invalid @enderror" id="karyawan_id" name="karyawan_id" >
                <option value="" disabled selected>Pilih Karyawan</option>
                @foreach($karyawans as $karyawan)
                    <option value="{{ $karyawan->id }}" {{ old('karyawan_id') == $karyawan->id ? 'selected' : '' }}>{{ $karyawan->name }}</option>
                @endforeach
            </select>
            @error('karyawan_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="produk_id" class="form-label">Produk</label>
            <select class="form-control @error('produk_id') is-invalid @enderror" id="produk_id" name="produk_id" >
                <option value="" disabled selected>Pilih Produk</option>
                @foreach($produks as $produk)
                    <option value="{{ $produk->id }}" {{ old('produk_id') == $produk->id ? 'selected' : '' }}>{{ $produk->name }}</option>
                @endforeach
            </select>
            @error('produk_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="total_price" class="form-label">Total Harga</label>
            <input type="number" class="form-control @error('total_price') is-invalid @enderror" id="total_price" name="total_price" value="{{ old('total_price') }}" >
            @error('total_price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
