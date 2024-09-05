@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Menu</h1>
    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Supplier</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produks as $produk)
            <tr>
                <td>{{ $produk->name }}</td>
                <td>{{ $produk->description }}</td>
                <td>Rp. {{ number_format($produk->price, 0, ',', '.') }}</td>
                <td>{{ $produk->kategori->name }}</td>
                <td>{{ $produk->supplayer->name }}</td>
                <td>
                    <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
