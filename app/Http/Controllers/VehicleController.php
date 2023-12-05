<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Customer;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles', compact('vehicles'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('vehiclesCreate', compact('customers'));        
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|max:255',
            'modelo' => 'required|max:15',
            'ano' => 'required|integer',
            'placa' => 'required|max:10',
            'idCliente' => 'required|exists:clientes,idCliente',
        ]);

        Vehicle::create($request->all());

        return redirect()->route('vehicles')->with('success', 'Veículo adicionado com sucesso!');
    }

    // Outras funções para editar e excluir veículos
}
