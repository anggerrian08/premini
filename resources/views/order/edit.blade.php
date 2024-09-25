@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Pesanan </h1>

        <form action="{{ route('order.update', $order) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="customer_id" class="form-label">Pembeli</label>
                <select class="form-control @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id" required>
                    <option value="" disabled>Pilih Pembeli</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('customer_id', $order->customer_id) == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
                @error('customer_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="karyawan_id" class="form-label">Karyawan</label>
                <select class="form-control @error('karyawan_id') is-invalid @enderror" id="karyawan_id" name="karyawan_id" required>
                    <option value="" disabled>Pilih Karyawan</option>
                    @foreach ($karyawans as $karyawan)
                        <option value="{{ $karyawan->id }}" {{ old('karyawan_id', $order->karyawan_id) == $karyawan->id ? 'selected' : '' }}>
                            {{ $karyawan->name }}
                        </option>
                    @endforeach
                </select>
                @error('karyawan_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="produk_id" class="form-label">Produk</label>
                <select class="form-control @error('produk_id') is-invalid @enderror" id="produk_id" name="produk_id" onchange="updateTotalPrice()" required>
                    <option value="" disabled>Pilih Produk</option>
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}" data-price="{{ $produk->price }}" {{ old('produk_id', $order->produk_id) == $produk->id ? 'selected' : '' }}>
                            {{ $produk->name }}
                        </option>
                    @endforeach
                </select>
                @error('produk_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Kuantitas</label>
                <input type="number" id="quantity" name="quantity" min="1" class="form-control @error('quantity') is-invalid @enderror" placeholder="Masukkan jumlah" value="{{ old('quantity', $order->quantity) }}" onchange="updateTotalPrice()" required>
                @error('quantity')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="total_price" class="form-label">Total Harga</label>
                <input type="number" class="form-control @error('total_price') is-invalid @enderror" id="total_price" name="total_price" value="{{ old('total_price', $order->total_price) }}" readonly>
                @error('total_price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <script>
        function updateTotalPrice() {
            const produkSelect = document.getElementById('produk_id');
            const totalPriceInput = document.getElementById('total_price');
            const quantityInput = document.getElementById('quantity');
            const selectedOption = produkSelect.options[produkSelect.selectedIndex];

            const price = selectedOption.getAttribute('data-price');
            const quantity = parseInt(quantityInput.value) || 0;
            const totalPrice = price * quantity;

            totalPriceInput.value = totalPrice;
        }
    </script>
@endsection
