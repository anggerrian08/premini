@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Menu</h1>

    <!-- Card Container -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('produk.update', $produk->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Menu</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $produk->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="description">{{ $produk->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Kuantitas</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $produk->quantity }}" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $produk->price }}" required>
                </div>
                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select class="form-control" id="kategori_id" name="kategori_id" required>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ $kategori->id == $produk->kategori_id ? 'selected' : '' }}>
                                {{ $kategori->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="supplayer_id" class="form-label">Pemasok</label>
                    <select class="form-control" id="supplayer_id" name="supplayer_id" required>
                        @foreach($supplayers as $supplayer)
                            <option value="{{ $supplayer->id }}" {{ $supplayer->id == $produk->supplayer_id ? 'selected' : '' }}>
                                {{ $supplayer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                        <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z"/>
                    </svg> Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
