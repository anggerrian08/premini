<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Produk;
use Illuminate\Http\Request;

class StokController extends Controller
{

    public function index()
    {

        $stoks = Stok::with('produk')->get();
        return view('stok.index', compact('stoks'));
    }


    public function create()
    {

        $produks = Produk::all();
        return view('stok.create', compact('produks'));
    }


    public function store(Request $request)
    {

        $request->validate([
            
            'produk_id' => 'required|exists:produks,id',
            'quantity' => 'required|integer|min:0',
        ], [
            'produk_id.required' => 'produk tidak boleh kosong',
            'quantity.required' => 'quantitas tidak boleh kosong',
        ]);


        Stok::create($request->all());


        return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan.');
    }


    public function show(Stok $stok)
    {

        return view('stok.show', compact('stok'));
    }


    public function edit(Stok $stok)
    {

        $produks = Produk::all();
        return view('stok.edit', compact('stok', 'produks'));
    }


    public function update(Request $request, Stok $stok)
    {

        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'quantity' => 'required|integer|min:0',
        ]);


        $stok->update($request->all());


        return redirect()->route('stok.index')->with('success', 'Stok berhasil diperbarui.');
    }


    public function destroy(Stok $stok)
    {

        $stok->delete();
        return redirect()->route('stok.index')->with('success', 'Stok berhasil dihapus.');
    }
}
