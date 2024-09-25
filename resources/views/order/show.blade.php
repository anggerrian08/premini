@extends('layouts.app') <!-- Pastikan ini mengarah ke layout yang Anda gunakan -->

@section('content')
    <div class="container">
        <h1>Detail Order #{{ $order->id }}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <strong>Customer:</strong> {{ $order->customers->name }}
        </div>
        <div class="mb-3">
            <strong>Karyawan:</strong> {{ $order->karyawans->name }}
        </div>

        <h3>Produk</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Kuantitas</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $produk)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $order->customers->name  }}</td> <!-- Gunakan customer dan properti name -->
                        <td>{{ $order->karyawans->name  }}</td>
                        <td>{{ $order->produks->name  }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ number_format($order->total_price, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mb-3">
            <strong>Total Harga:</strong> {{ number_format($order->total_price, 2, ',', '.') }}
        </div>

        <a href="{{ route('order.index') }}" class="btn btn-secondary">Kembali ke Daftar Order</a>
        <a href="{{ route('order.edit', $order) }}" class="btn btn-warning">Edit Order</a>
        <form action="{{ route('order.destroy', $order) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Apakah Anda yakin ingin menghapus order ini?')">Hapus Order</button>
        </form>
    </div>
@endsection
