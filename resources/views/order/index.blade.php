@extends('layouts.app') <!-- Pastikan ini mengarah ke layout yang Anda gunakan -->

@section('content')
    <div class="container">
        <h1>Daftar Order</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Customer</th>
                    <th>Karyawan</th>
                    <th>Produk</th>
                    <th>Jumlah Pesanan</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $order->customers->name  }}</td> <!-- Gunakan customer dan properti name -->
                        <td>{{ $order->karyawans->name  }}</td>
                        <td>{{ $order->produks->name  }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ number_format($order->total_price, 2, ',', '.') }}</td>
                        {{-- <td>{{ $order->produk->price }}</td> --}}
                        <td>
                            {{-- <a href="{{ route('order.show', $order) }}" class="btn btn-info">Lihat</a> --}}
                            <a href="{{ route('order.edit', $order) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('order.destroy', $order) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus order ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('order.create') }}" class="btn btn-primary">Tambah Order Baru</a>
    </div>
@endsection
