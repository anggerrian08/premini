@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Menu</h1>

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Menu</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" >
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select class="form-control @error('kategori_id') is-invalid @enderror" id="kategori_id" name="kategori_id" >
                <option value="" disabled {{ old('kategori_id') ? '' : 'selected' }}>Pilih Kategori</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->name }}</option>
                @endforeach
            </select>
            @error('kategori_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplayer_id" class="form-label">Supplier</label>
            <select class="form-control @error('supplayer_id') is-invalid @enderror" id="supplayer_id" name="supplayer_id" >
                <option value="" disabled {{ old('supplayer_id') ? '' : 'selected' }}>Pilih Supplier</option>
                @foreach($supplayers as $supplayer)
                    <option value="{{ $supplayer->id }}" {{ old('supplayer_id') == $supplayer->id ? 'selected' : '' }}>{{ $supplayer->name }}</option>
                @endforeach
            </select>
            @error('supplayer_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
