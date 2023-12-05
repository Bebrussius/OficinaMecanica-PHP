<?php

// app/Http/Controllers/CustomerController.php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers', compact('customers'));
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function create()
    {
        return view('customersCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'telefone' => 'required|max:15',
            'email' => 'nullable|email|max:255',
            'endereco' => 'nullable|max:255',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers')->with('success', 'Cliente adicionado com sucesso!');
    }

    public function destroy($id)
{
    $customer = Customer::findOrFail($id);
    $customer->delete();

    return redirect()->route('customers.index')->with('success', 'Cliente excluído com sucesso!');
}
}
