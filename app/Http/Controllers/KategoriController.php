<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan semua data kategori
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255|unique:kategoris,name',
            'description' => 'nullable|string',
        ],[
            'name.required' => 'Nama tidak boleh kosong',

            'name.unique'=>'Kategori yang di inputkan sudah ada',
            
            'description.required' => 'Deskripsi tidak boleh kosong',
        ]);

        // Isi default "-" jika description kosong
        $data = $request->all();
        if (empty($data['description'])) {
            $data['description'] = '-';
        }

        // Menyimpan kategori baru
        Kategori::create($data);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255|unique:kategoris,name,'.$kategori->id,
            'description' => 'nullable|string',
        ]);

        // Isi default "-" jika description kosong
        $data = $request->all();
        if (empty($data['description'])) {
            $data['description'] = '-';
        }

        // Update kategori
        $kategori->update($data);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        try {
            // Hapus kategori
            $kategori->delete();

            // Redirect ke halaman index dengan pesan sukses
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
        } catch (QueryException $e) {
            // Tangani error, seperti ketika kategori terkait dengan produk lain
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak bisa dihapus karena terkait dengan data lain.');
        }
    }
}
