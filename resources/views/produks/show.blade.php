@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Produk</h1>

    <table class="table table-bordered">
        <tr>
            <th>Nama Produk</th>
            <td>{{ $produk->name }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $produk->description }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>{{ $produk->price }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ $produk->kategori->name }}</td>
        </tr>
        <tr>
            <th>Supplier</th>
            <td>{{ $produk->supplayer->name }}</td>
        </tr>
    </table>

    <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
