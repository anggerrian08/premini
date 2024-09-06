<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan semua data karyawan
        $karyawans = Karyawan::all();
        return view('karyawan.index', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawans,email',
            'phone' => 'required|string|max:20',
            'position' => 'required|string|max:255',
        ],[
            'name.required' => 'nama tidak boleh kosong',

            'email.required' => 'email tidak boleh kosong',

            'phone.required' => 'nomer telepon tidak boleh kosong',

            'position.required' => 'jabatan tidak boleh kosong',


        ]);

        // Membuat karyawan baru
        Karyawan::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawans,email,' . $karyawan->id,
            'phone' => 'nullable|string|max:20',
            'position' => 'required|string|max:255',
        ]);

        // Update data karyawan
        $karyawan->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        // Hapus data karyawan
        $karyawan->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }
}
