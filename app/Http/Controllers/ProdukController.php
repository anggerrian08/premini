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
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Query produk dengan kondisi pencarian
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
            ->with(['kategori', 'supplayer']) // eager load kategori dan supplayer
            ->paginate(10);

        return view('produks.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
            'description' => 'required|nullable|string',
            'price' => 'required|numeric|min:0',
            'kategori_id' => 'required|exists:kategoris,id',
            'supplayer_id' => 'required|exists:supplayers,id',
            'file' => 'nullable|mimes:jpg,png,jpeg|max:2048', // Validasi file gambar
        ]);

        // Proses file upload jika ada
        $filePath = null;
        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
        }

        // Membuat produk baru
        $produk = new Produk();
        $produk->name = $request->name;
        $produk->description = $request->description;
        $produk->price = $request->price;
        $produk->kategori_id = $request->kategori_id;
        $produk->supplayer_id = $request->supplayer_id;
        $produk->file_path = $filePath; // Simpan path file jika ada
        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $kategoris = Kategori::all();
        $supplayers = Supplayer::all();
        return view('produks.edit', compact('produk', 'kategoris', 'supplayers'));
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
            'file' => 'nullable|mimes:jpg,png,jpeg|max:2048', // Validasi file gambar
        ]);

        // Proses file upload jika ada
        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $produk->file_path = $filePath; // Update file path
        }

        // Update produk
        $produk->update($request->except(['file']));

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        // Hapus produk
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
