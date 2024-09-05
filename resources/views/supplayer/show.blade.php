@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Supplayer</h1>

    <table class="table table-bordered">
        <tr>
            <th>Nama Supplayer</th>
            <td>{{ $supplayer->name }}</td>
        </tr>
        <tr>
            <th>Kontak Person</th>
            <td>{{ $supplayer->contact_person }}</td>
        </tr>
        <tr>
            <th>Telepon</th>
            <td>{{ $supplayer->phone }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $supplayer->address }}</td>
        </tr>
    </table>

    <a href="{{ route('supplayer.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
