@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Stok</h1>

    <form action="{{ route('stok.store') }}" method="POST">
        @csrf
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
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}" >
            @error('quantity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
