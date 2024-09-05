<!-- resources/views/kategoris/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kategori</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nama: {{ $kategori->name }}</h5>
            <p class="card-text">Deskripsi: {{ $kategori->description }}</p>
        </div>
    </div>

    <a href="{{ route('kategori.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
