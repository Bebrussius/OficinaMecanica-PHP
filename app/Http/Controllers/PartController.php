<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index()
    {
        $parts = Part::all();
        return view('parts', compact('parts'));
    }

    public function create()
    {
        return view('partsCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'preco' => 'nullable|numeric|min:0',
            'quantidade' => 'required|integer|min:1',
        ]);

        Part::create($request->only(['nome', 'descricao', 'preco', 'quantidade']));

        return redirect()->route('parts')->with('success', 'Peça adicionada com sucesso!');
    }

    public function destroy($id)
{
    $part = Part::findOrFail($id);

    $part->serviceOrders()->delete();

    $part->delete();

    return redirect()->route('parts')->with('success', 'Peça excluída com sucesso!');
}
}
