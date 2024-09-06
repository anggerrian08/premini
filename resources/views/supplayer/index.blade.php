@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Supplayer</h1>
    <a href="{{ route('supplayer.create') }}" class="btn btn-primary mb-3">Tambah Supplayer</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($supplayers as $supplayer)
            <tr>
                <td>{{ $supplayer->name }}</td>
                <td>{{ $supplayer->email }}</td>
                <td>{{ $supplayer->phone }}</td>
                <td>{{ $supplayer->address }}</td>
                <td>
                    <a href="{{ route('supplayer.show', $supplayer->id) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('supplayer.edit', $supplayer->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('supplayer.destroy', $supplayer->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus supplayer ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
