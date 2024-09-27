@extends('layouts.app')

@section('content')

<div class="container mt-5 table-shadow">
    <h1>Daftar Menu</h1>

    <form action="{{ route('produk.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Cari nama menu atau kategori..." value="{{ request()->query('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
        </svg> Tambah Menu 
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Ubah row menjadi flex container -->
    <div class="row">
        @foreach($produks as $produk)
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4"> <!-- Responsif sesuai ukuran layar -->
            <div class="card h-100"> <!-- Pastikan ketinggian kartu konsisten -->
                @if($produk->file_path)
                    <img src="{{ asset('storage/'.$produk->file_path) }}" class="card-img-top" alt="{{ $produk->name }}" style="height: 200px; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/200" class="card-img-top" alt="{{ $produk->name }}" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body card-shadow">
                    <p class="card-text"><strong>Nama:</strong> {{ $produk->name }}</p>
                    <p class="card-text"><strong>Deskripsi:</strong> {{ $produk->description }}</p>
                    <p class="card-text"><strong>Kuantitas:</strong> {{ $produk->quantity}}</p>
                    <p class="card-text"><strong>Harga:</strong> Rp. {{ number_format($produk->price, 0, ',', '.') }}</p>
                    <p class="card-text"><strong>Kategori:</strong> {{ $produk->kategori->name }}</p>
                    <p class="card-text"><strong>Supplayer:</strong> {{ $produk->supplayer->name }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg> Edit 
                    </a>
                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                            </svg>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-side">
        {{ $produks->links() }}
    </div>
</div>
@endsection
