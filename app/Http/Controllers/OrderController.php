<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Karyawan;
use App\Models\Produk;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index()
    {

        $orders = Order::with(['customers', 'karyawans', 'produks'])->get();
        return view('order.index', compact('orders'));
    }

    public function create()
    {

        $customers = Customer::all();
        $karyawans = Karyawan::all();
        $produks = Produk::all();
        return view('order.create', compact('customers', 'karyawans', 'produks'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'karyawan_id' => 'required|exists:karyawans,id',
            'produk_id.*' => 'required|exists:produks,id',
            'quantity' => 'required',
            'total_price' => 'required',
        ]);

        $total = $request->quantity;

        $id = $request->produk_id;
        $productId = Produk::where('id', $id)->get();
        foreach($productId as $product){
            $id = Produk::find($product);
            $product->update([
                'quantity' => $product->quantity - $total
            ]);
        }
        
        
        Order::create($request->only(['customer_id', 'karyawan_id','produk_id','quantity','total_price']));


        return redirect()->route('order.index')->with('success', 'Order berhasil ditambahkan.');
    }

    public function show(Order $order)
    {

        return view('order.show', compact('order'));
    }

    public function edit(Order $order)
    {

        $customers = Customer::all();
        $karyawans = Karyawan::all();
        $produks = Produk::all();


        return view('order.edit', compact('order', 'customers', 'karyawans', 'produks'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'karyawan_id' => 'required|exists:karyawans,id',
            'produk_id.*' => 'required|exists:produks,id',
            'quantity' => 'required',
            'total_price' => 'required',
        ]);


        $order->update($request->only(['customer_id', 'karyawan_id','produk_id','quantity','total_price']));


        return redirect()->route('order.index')->with('success', 'Order berhasil diperbarui.');
    }

    public function destroy(Order $order)
    {

        $order->delete();


        return redirect()->route('order.index')->with('success', 'Order berhasil dihapus.');
    }
}
