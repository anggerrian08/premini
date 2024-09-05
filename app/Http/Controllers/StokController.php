<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Produk;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan semua stok dengan relasi produk
        $stoks = Stok::with('produk')->get();
        return view('stok.index', compact('stoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mendapatkan data produk untuk form
        $produks = Produk::all();
        return view('stok.create', compact('produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'quantity' => 'required|integer|min:0',
        ]);

        // Membuat stok baru
        Stok::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stok $stok)
    {
        // Menampilkan detail stok
        return view('stok.show', compact('stok'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        // Mendapatkan data produk untuk form edit
        $produks = Produk::all();
        return view('stok.edit', compact('stok', 'produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stok $stok)
    {
        // Validasi input
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'quantity' => 'required|integer|min:0',
        ]);

        // Update stok
        $stok->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('stok.index')->with('success', 'Stok berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $stok)
    {
        // Hapus stok
        $stok->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('stok.index')->with('success', 'Stok berhasil dihapus.');
    }
}
