@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Stok</h1>

    <div class="mb-3">
        <label for="produk_name" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" id="produk_name" value="{{ $stok->produk->name }}" readonly>
    </div>

    <div class="mb-3">
        <label for="quantity" class="form-label">Jumlah Stok</label>
        <input type="text" class="form-control" id="quantity" value="{{ $stok->quantity }}" readonly>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="description" rows="3" readonly>{{ $stok->description }}</textarea>
    </div>

    <a href="{{ route('stok.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
