<?php

// app/Http/Controllers/ServiceTypeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceType;

class ServiceTypeController extends Controller
{
    public function index()
    {
        $serviceTypes = ServiceType::all();
        return view('serviceTypes', compact('serviceTypes'));
    }

    public function create()
    {
        return view('serviceTypesCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
            'Tipo' => 'required|string',
        ]);

        ServiceType::create($request->all());

        return redirect()->route('serviceTypes')->with('success', 'Tipo de Serviço adicionado com sucesso!');
    }

    public function destroy($id)
{
    $serviceType = ServiceType::findOrFail($id);

    $serviceType->serviceOrders()->delete();

    $serviceType->delete();

    return redirect()->route('serviceTypes')->with('success', 'Tipo de serviço excluído com sucesso!');
}
}