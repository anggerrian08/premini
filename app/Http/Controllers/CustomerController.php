<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {

        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }


    public function create()
    {
        return view('customer.create');
    }


    public function store(Request $request)
    {

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


        Customer::create($request->all());


        return redirect()->route('customer.index')->with('success', 'Customer berhasil ditambahkan.');
    }


    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }


    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }


    public function update(Request $request, Customer $customer)
    {

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


        $customer->update($request->all());


        return redirect()->route('customer.index')->with('success', 'Customer berhasil diperbarui.');
    }


    public function destroy(Customer $customer)
    {

        $customer->delete();


        return redirect()->route('customer.index')->with('success', 'Customer berhasil dihapus.');
    }
}
