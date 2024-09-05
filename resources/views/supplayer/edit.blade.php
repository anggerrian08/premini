@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Supplayer</h1>

    <form action="{{ route('supplayer.update', $supplayer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Supplayer</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $supplayer->name }}" required>
        </div>
        <div class="mb-3">
            <label for="contact_person" class="form-label">Kontak Person</label>
            <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ $supplayer->contact_person }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $supplayer->phone }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control" id="address" name="address">{{ $supplayer->address }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
