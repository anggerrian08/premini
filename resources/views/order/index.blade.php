@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Order</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('order.create') }}" class="btn btn-primary mb-3">Tambah Order</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Karyawan</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->customer->name }}</td>
                    <td>{{ $order->karyawan->name }}</td>
                    <td>{{ number_format($order->total_price, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('order.show', $order->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('order.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('order.destroy', $order->id) }}" method="POST" style="display:inline;">
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
