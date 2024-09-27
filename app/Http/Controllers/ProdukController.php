<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Supplayer;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');


        $produks = Produk::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('price', 'like', "%{$search}%")
                    ->orWhereHas('kategori', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('supplayer', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    });
            })
            ->with(['kategori', 'supplayer']) 
            ->paginate(10);

        return view('produks.index', compact('produks'));
    }


    public function create()
    {
        $kategoris = Kategori::all();
        $supplayers = Supplayer::all();
        return view('produks.create', compact('kategoris', 'supplayers'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'kategori_id' => 'required|exists:kategoris,id',
            'supplayer_id' => 'required|exists:supplayers,id',
            'file' => 'required|mimes:jpg,png,jpeg|max:2048',
        ], [
            'name.required' => 'nama tidak boleh kosong',
            'description.required' => 'deskripsi tidak boleh kosong',
            'price.required' => 'harga tidak boleh kosong',
            'quantity.required' => 'kuantitas harus di isi',
            'kategoti_id.required' => 'kategori tidak boleh kosong',
            'file.required' => 'file tidak boleh kosong',
            'supplayer_id.required' => 'supplayer tidak boleh kosong'
        ]);


        $filePath = null;
        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
        }


        $produk = new Produk();
        $produk->name = $request->name;
        $produk->description = $request->description;
        $produk->price = $request->price;
        $produk->quantity = $request->quantity;
        $produk->kategori_id = $request->kategori_id;
        $produk->supplayer_id = $request->supplayer_id;
        $produk->file_path = $filePath;
        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }
    public function edit(Produk $produk)
    {
        $kategoris = Kategori::all();
        $supplayers = Supplayer::all();
        return view('produks.edit', compact('produk', 'kategoris', 'supplayers'));
    }


    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'kategori_id' => 'required|exists:kategoris,id',
            'supplayer_id' => 'required|exists:supplayers,id',
            'file' => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ], [
            'name.required' => 'nama tidak boleh kosong',
            'description.required' => 'deskripsi tidak boleh kosong',
            'price.required' => 'harga tidak boleh kosong',
            'quantity.required' => 'kuantitas harus di isi',
            'kategoti_id.required' => 'kategori tidak boleh kosong',
            'supplayer_id.required' => 'supplayer tidak boleh kosong'
        ]);

        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $produk->file_path = $filePath;
        }
        $produk->update($request->except(['file']));

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }
    public function destroy(Produk $produk)
    {
        try {
            $produk->delete();
            return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('produk.index')->with('success', 'Produk gagal dihapus, data masih di gunakan');
        }
    }
}
