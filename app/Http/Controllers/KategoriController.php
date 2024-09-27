<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }


    public function create()
    {
        return view('kategori.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:kategoris,name',
            'description' => 'nullable|string',
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'name.unique'=>'Kategori yang di inputkan sudah ada',
            'description.required' => 'Deskripsi tidak boleh kosong',
        ]);


        $data = $request->all();
        if (empty($data['description'])) {
            $data['description'] = '-';
        }


        Kategori::create($data);


        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }


    public function show(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }


    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }


    public function update(Request $request, Kategori $kategori)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:kategoris,name,'.$kategori->id,
            'description' => 'nullable|string',
        ]);


        $data = $request->all();
        if (empty($data['description'])) {
            $data['description'] = '-';
        }


        $kategori->update($data);


        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }


    public function destroy(Kategori $kategori)
    {
        try {
            $kategori->delete();
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
        } catch (QueryException $e) {

            return redirect()->route('kategori.index')->with('error', 'Kategori tidak bisa dihapus karena terkait dengan data lain.');
        }
    }
}
