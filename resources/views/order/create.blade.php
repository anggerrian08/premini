@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Tambah Pesanan</h1>

        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="customer_id" class="form-label">Pembeli</label>
                <select class="form-control @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id" required>
                    <option value="" disabled selected>Pilih Pembeli</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
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
                    <option value="" disabled selected>Pilih Karyawan</option>
                    @foreach ($karyawans as $karyawan)
                        <option value="{{ $karyawan->id }}" {{ old('karyawan_id') == $karyawan->id ? 'selected' : '' }}>
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
                    <option value="" disabled selected>Pilih Produk</option>
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}" data-price="{{ $produk->price }}" {{ old('produk_id') == $produk->id ? 'selected' : '' }}>
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
                <input type="number" id="quantity" name="quantity" min="1" class="form-control @error('quantity') is-invalid @enderror" placeholder="Masukkan jumlah" value="{{ old('quantity') }}" onchange="updateTotalPrice()" required>
                @error('quantity')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="total_price" class="form-label">Total Harga</label>
                <input type="number" class="form-control @error('total_price') is-invalid @enderror" id="total_price" name="total_price" value="{{ old('total_price') }}" readonly>
                @error('total_price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                    <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z" />
                </svg> Simpan
            </button>
        </form>
    </div>

    <script>
        function updateTotalPrice() {
            const produkSelect = document.getElementById('produk_id');
            const totalPriceInput = document.getElementById('total_price');
            const quantityInput = document.getElementById('quantity');
            const selectedOption = produkSelect.options[produkSelect.selectedIndex];

            // Ambil harga dari atribut data-price
            const price = selectedOption.getAttribute('data-price');
            const quantity = parseInt(quantityInput.value) || 0;

            // Hitung total harga
            const totalPrice = price * quantity; // Kalikan harga dengan kuantitas

            totalPriceInput.value = totalPrice; // Update input total harga
        }
    </script>
@endsection
