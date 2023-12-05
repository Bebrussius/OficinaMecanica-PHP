<?php

// app/Http/Controllers/ServiceOrderController.php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Mechanic;
use App\Models\ServiceType;
use App\Models\Vehicle;
use App\Models\Part;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class ServiceOrderController extends Controller
{

    public function create()
    {
        $customers = Customer::all();
        $vehicles = Vehicle::all();
        $mechanics = Mechanic::all();
        $serviceTypes = ServiceType::all();
        $parts = Part::all();

        return view('serviceOrderCreate', compact('customers', 'vehicles', 'mechanics', 'serviceTypes', 'parts'));
    }

    public function index()
    {
        $serviceOrders = ServiceOrder::all();
        return view('serviceOrder', compact('serviceOrders'));
    }

    public function show(ServiceOrder $serviceOrder)
    {
        return view('serviceOrders.show', compact('serviceOrder'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dataEntrada' => 'required|date',
            'cliente_nome' => 'required|exists:clientes,nome',
            'placa_veiculo' => 'required|exists:veiculos,placa',
            'nome_mecanico' => 'required|exists:mecanicos,nome',
            'tipo_servico' => 'required|exists:tiposdeservico,servicoId',
            'peca' => 'required|exists:pecas,idPeca',
            'defeito' => 'required',
        ]);

        $idCliente = Customer::where('nome', $request->input('cliente_nome'))->value('idCliente');
        $idVeiculo = Vehicle::where('placa', $request->input('placa_veiculo'))->value('idVeiculo');
        $idMecanico = Mechanic::where('nome', $request->input('nome_mecanico'))->value('idMecanico');
        $idPeca = $request->input('peca');

        $serviceOrder = ServiceOrder::create([
            'dataEntrada' => $request->input('dataEntrada'),
            'idCliente' => $idCliente,
            'idVeiculo' => $idVeiculo,
            'idMecanico' => $idMecanico,
            'servicoId' => $request->input('tipo_servico'),
            'idPeca' => $idPeca,
            'defeito' => $request->input('defeito'),
        ]);

        return redirect()->route('serviceOrder')->with('success', 'Ordem de Serviço criada com sucesso!');


    }

    public function destroy($id)
    {
        $hasOrders = ServiceOrder::where('idCliente', $id)->exists();

        if ($hasOrders) {
            return redirect()->route('customers')->with('error', 'Não é possível excluir o cliente enquanto houver ordens de serviço associadas.');
        }

        Customer::destroy($id);

        return redirect()->route('customers')->with('success', 'Cliente excluído com sucesso!');
    }
}