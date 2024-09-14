<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Karyawan;
use App\Models\Produk;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan semua order
        $orders = Order::with(['customer', 'karyawan'])->get();
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
        // Validasi input
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'karyawan_id' => 'required|exists:karyawans,id',
            'produk_id' => 'required|',
            'produk_ids.*' => 'required|exists:produks,id',
            'total_price' => 'required|numeric',
        ],[
            'customer_id.required' => 'customer tidak boleh kosong',
            'karyawan_id.required' => 'karyawan tidak boleh kosong',
            'produk_ids.required' => 'produk tidak boleh kosong',
            'total_price.required' => 'harga tidak boleh kosong',

        ]);

        // Membuat order baru
        $order = Order::create($request->only(['customer_id', 'karyawan_id', 'total_price', 'status']));

        // Menyimpan produk yang dipilih ke dalam tabel pivot 'order_items'
        $order->produk()->attach($request->produk_ids);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('order.index')->with('success', 'Order berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // Menampilkan detail order dengan relasi ke customer, karyawan, dan produk
        $customers = Customer::all();
        $karyawans = Karyawan::all();
        $produks = Produk::all();
        return view('order.show', compact('order','customers', 'karyawans', 'produks'));
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
        return view('order.edit', compact( 'order','customers', 'karyawans', 'produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
{

    // Validasi input
    $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'karyawan_id' => 'required|exists:karyawans,id',
        'total_price' => 'required|numeric',

        // Tambahkan 'status' jika Anda menyertakan kolom status
        // 'status' => 'required|string|max:255',
    ]);


    // Update order
    $order->update($request->only(['customer_id', 'karyawan_id', 'total_price']));


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
