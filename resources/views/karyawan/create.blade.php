<!-- resources/views/karyawans/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Karyawan Baru</h1>

    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telepon</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Jabatan</label>
            <select name="position" id="position" class="form-control @error('position') is-invalid @enderror" required>
                <option value="" disabled {{ old('position') ? '' : 'selected' }}>Pilih Jabatan</option>
                <option value="Manager" {{ old('position') == 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Supervisor" {{ old('position') == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                <option value="Staff" {{ old('position') == 'Staff' ? 'selected' : '' }}>Staff</option>
                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
            </select>
            @error('position')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
