<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Karyawan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan semua order dengan relasi ke customer, karyawan, dan produk
        $orders = Order::with(['customers', 'karyawans', 'produks'])->get();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mendapatkan data pelanggan, karyawan, dan produk
        $customers = Customer::all();
        $karyawans = Karyawan::all();
        $produks = Produk::all();
        return view('order.create', compact('customers', 'karyawans', 'produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input termasuk quantity
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'karyawan_id' => 'required|exists:karyawans,id',
            'produk_id.*' => 'required|exists:produks,id',
            'quantity' => 'required',
            'total_price' => 'required',
        ]);

        // Membuat order baru
        $order = Order::create($request->only(['customer_id', 'karyawan_id','produk_id','quantity','total_price']));

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('order.index')->with('success', 'Order berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // Menampilkan detail order dengan relasi ke customer, karyawan, dan produk
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        // Mendapatkan data pelanggan, karyawan, dan produk untuk form edit
        $customers = Customer::all();
        $karyawans = Karyawan::all();
        $produks = Produk::all();

        // Menampilkan form edit order
        return view('order.edit', compact('order', 'customers', 'karyawans', 'produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'karyawan_id' => 'required|exists:karyawans,id',
            'produk_id.*' => 'required|exists:produks,id',
            'quantity' => 'required',
            'total_price' => 'required',
        ]);

        // Update order
        $order->update($request->only(['customer_id', 'karyawan_id','produk_id','quantity','total_price']));

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('order.index')->with('success', 'Order berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        // Hapus order
        $order->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('order.index')->with('success', 'Order berhasil dihapus.');
    }
}
