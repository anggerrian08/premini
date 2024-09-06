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
            <label for="quantity" class="form-label">Kuantitas</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $stok->quantity }}" required>
        </div>
        <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z"/>
          </svg> Simpan</button>
    </form>
</div>
@endsection
