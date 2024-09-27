<?php

namespace App\Http\Controllers;

use App\Models\Supplayer;
use Illuminate\Http\Request;

class SupplayerController extends Controller
{

    public function index()
    {
        $supplayers = Supplayer::all();
        return view('supplayer.index', compact('supplayers'));
    }


    public function create()
    {
        return view('supplayer.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:supplayers,email',
            'phone' => 'required|string|max:20|unique:supplayers,phone',
            'address' => 'nullable|string',
        ], [
            'name.required' => 'nama tidak boleh kosong',
            'email.required' => 'kontak tidak boleh kosong',
            'email.unique' => 'email sudah terdaftar',
            'phone.required' => 'telepon tidak boleh kosong',
            'phone.unique' => 'telepon sudah terdaftar',
        ]);

        Supplayer::create($request->all());

        return redirect()->route('supplayer.index')->with('success', 'Supplayer berhasil ditambahkan.');
    }


    public function show(Supplayer $supplayer)
    {

        return view('supplayer.show', compact('supplayer'));
    }


    public function edit(Supplayer $supplayer)
    {

        return view('supplayer.edit', compact('supplayer'));
    }


    public function update(Request $request, Supplayer $supplayer)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:supplayers,email',
            'phone' => 'required|string|max:20|unique:supplayers,phone',
            'address' => 'nullable|string',
        ], [
            'name.required' => 'nama tidak boleh kosong',
            'email.required' => 'kontak tidak boleh kosong',
            'email.unique' => 'email sudah terdaftar',
            'phone.required' => 'telepon tidak boleh kosong',
            'phone.unique' => 'telepon sudah terdaftar',
        ]);
        $supplayer->update($request->all());


        return redirect()->route('supplayer.index')->with('success', 'Supplayer berhasil diperbarui.');
    }


    public function destroy(Supplayer $supplayer)
    {
        try {
            $supplayer->delete();
            return redirect()->route('supplayer.index')->with('success', 'Supplayer berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('supplayer.index')->with('error', 'data ini masih di pakai');
        }
    }
}
