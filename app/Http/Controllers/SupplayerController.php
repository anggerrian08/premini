<?php

namespace App\Http\Controllers;

use App\Models\Supplayer;
use Illuminate\Http\Request;

class SupplayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan daftar supplayer
        $supplayers = Supplayer::all();
        return view('supplayer.index', compact('supplayers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk menambahkan supplayer baru
        return view('supplayer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
        ],[
            'name.required' => 'nama tidak boleh kosong',

            'email.required' => 'kontak tidak boleh kosong',

            'telepon.required' => 'telepon tidak boleh kosong',
        ]);

        // Menyimpan data supplayer baru
        Supplayer::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('supplayer.index')->with('success', 'Supplayer berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplayer $supplayer)
    {
        // Menampilkan detail supplayer
        return view('supplayer.show', compact('supplayer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplayer $supplayer)
    {
        // Menampilkan form untuk edit supplayer
        return view('supplayer.edit', compact('supplayer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplayer $supplayer)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
        ]);

        // Update data supplayer
        $supplayer->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('supplayer.index')->with('success', 'Supplayer berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplayer $supplayer)
    {
        // Menghapus data supplayer
        $supplayer->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('supplayer.index')->with('success', 'Supplayer berhasil dihapus.');
    }
}
