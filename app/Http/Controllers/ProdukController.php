<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Supplayer;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan semua produk dengan relasi ke kategori dan supplier
        $produks = Produk::with(['kategori', 'supplayer'])->get();
        return view('produks.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mendapatkan semua kategori dan supplier untuk form
        $kategoris = Kategori::all();
        $supplayers = Supplayer::all();
        return view('produks.create', compact('kategoris', 'supplayers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'kategori_id' => 'required|exists:kategoris,id',  // pastikan nama tabel dan kolom benar
        'supplayer_id' => 'required|exists:supplayers,id',  // pastikan nama tabel dan kolom benar
    ]);

    // Membuat produk baru dengan hanya data yang dibutuhkan
    $produk = new Produk();
    $produk->name = $request->name;
    $produk->description = $request->description;
    $produk->price = $request->price;
    $produk->kategori_id = $request->kategori_id;
    $produk->supplayer_id = $request->supplayer_id;

    // Simpan produk ke database
    $produk->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        // Menampilkan detail produk
        return view('produks.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        // Mendapatkan kategori dan supplier untuk form edit
        $kategoris = Kategori::all();
        $supplayers = Supplayer::all();

        return view('produk.edit', compact('produk', 'kategoris', 'supplayers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'kategori_id' => 'required|exists:kategoris,id',
            'supplayer_id' => 'required|exists:supplayers,id',
        ]);

        // Update produk
        $produk->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        // Hapus produk
        $produk->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
