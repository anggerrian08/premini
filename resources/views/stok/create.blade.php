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
            <label for="quantity" class="form-label">Kuantitas</label>
            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}" >
            @error('quantity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z"/>
          </svg> Simpan</button>
    </form>
</div>
@endsection
