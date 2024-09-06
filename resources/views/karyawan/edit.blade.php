<!-- resources/views/karyawans/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Karyawan</h1>

    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $karyawan->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $karyawan->email }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telepon</label>
            <input type="text" name="phone" class="form-control" value="{{ $karyawan->phone }}">
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Jabatan</label>
            <select name="position" id="position" class="form-control" required>
                <option value="" disabled selected>Pilih Jabatan</option>
                <option value="Manager" {{ old('position') == 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Supervisor" {{ old('position') == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                <option value="Staff" {{ old('position') == 'Staff' ? 'selected' : '' }}>Staff</option>
                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z"/>
          </svg> Simpan</button>
    </form>
</div>
@endsection
