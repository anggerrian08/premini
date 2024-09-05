@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Stok</h1>

    <form action="{{ route('stok.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="produk_id" class="form-label">Produk</label>
            <select class="form-control" id="produk_id" name="produk_id" required>
                <option value="" disabled selected>Pilih Produk</option>
                @foreach($produks as $produk)
                    <option value="{{ $produk->id }}">{{ $produk->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
