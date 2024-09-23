<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     */
    public function index()
    {
        // Mendapatkan semua data customer
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new customer.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|nullable|string',
        ],[
            'name.required' => 'nama tidak boleh kosong',

            'email.required' => 'email tidak boleh kosong',
            'email.email' => 'email tidak boleh kosong',
            'email.unique' => 'email tidak boleh sama',

            'phone.required' => 'nomer telepon tidak boleh kosong',

            'address.required' => 'alamat tidak boleh kosong',


        ]);

        // Membuat customer baru
        Customer::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('customer.index')->with('success', 'Customer berhasil ditambahkan.');
    }

    /**
     * Display the specified customer.
     */
    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified customer.
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified customer in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
        ],[
            'name.required' => 'nama tidak boleh kosong',

            'email.required' => 'email tidak boleh kosong',
            'email.email' => 'email tidak boleh kosong',
            'email.unique' => 'email tidak boleh sama',

            'phone.required' => 'nomer telepon tidak boleh kosong',

            'address.required' => 'alamat tidak boleh kosong',


        ]);

        // Update customer
        $customer->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('customer.index')->with('success', 'Customer berhasil diperbarui.');
    }

    /**
     * Remove the specified customer from storage.
     */
    public function destroy(Customer $customer)
    {
        // Hapus customer
        $customer->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('customer.index')->with('success', 'Customer berhasil dihapus.');
    }
}
