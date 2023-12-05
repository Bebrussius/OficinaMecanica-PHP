<?php

// app/Http/Controllers/MechanicController.php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function index()
    {
        $mechanics = Mechanic::all();
        return view('mechanics', compact('mechanics'));
    }

    public function show(Mechanic $mechanic)
    {
        return view('mechanics.show', compact('mechanic'));
    }

    public function create()
    {
        return view('mechanicsCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'especializacao' => 'required|max:255',
        ]);

        Mechanic::create($request->all());

        return redirect()->route('mechanics')->with('success', 'Mecânico adicionado com sucesso!');
    }

    // Outras funções para editar e excluir mecânicos
}

