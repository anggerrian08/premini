<!-- resources/views/karyawans/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Karyawan</h1>

    <div class="mb-3">
        <strong>Nama:</strong> {{ $karyawan->name }}
    </div>
    <div class="mb-3">
        <strong>Email:</strong> {{ $karyawan->email }}
    </div>
    <div class="mb-3">
        <strong>Telepon:</strong> {{ $karyawan->phone }}
    </div>
    <div class="mb-3">
        <strong>Jabatan:</strong> {{ $karyawan->position }}
    </div>

    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
