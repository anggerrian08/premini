@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Stok</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('stok.create') }}" class="btn btn-primary mb-3">Tambah Stok</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Quantity</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stoks as $stok)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $stok->produk->name }}</td>
                    <td>{{ $stok->quantity }}</td>
                    <td>
                        <a href="{{ route('stok.edit', $stok->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('stok.destroy', $stok->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
