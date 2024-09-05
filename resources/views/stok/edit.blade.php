@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Stok</h1>

    <form action="{{ route('stok.update', $stok->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="produk_id" class="form-label">Produk</label>
            <select class="form-control" id="produk_id" name="produk_id" required>
                @foreach($produks as $produk)
                    <option value="{{ $produk->id }}" {{ $produk->id == $stok->produk_id ? 'selected' : '' }}>{{ $produk->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $stok->quantity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
