<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problema;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;

class ProblemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $pacientes = Paciente::where('user_id', $userId)->get();
        $pacientesId = $pacientes->pluck('id');
        $problemas = Problema::whereIn('paciente_id', $pacientesId)->get();
        return view('problema.index', compact('problemas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::id();
        $pacientes = Paciente::where('user_id', $userId)->get();
        return view('problema.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'data_identificacao' => 'required|date',
            'problema' => 'required|string|max:255',
            'evolucao' => 'required|string',
        ]);

        Problema::create($request->all());
        return redirect()->route('problema.index')->with('insercao', 'Problema identificado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $problema = Problema::findOrFail($id);
        return view('problema.show', compact('problema'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $problema = Problema::findOrFail($id);
        $userId = Auth::id();
        $pacientes = Paciente::where('user_id', $userId)->get();
        return view('problema.edit', compact('problema', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $problema = Problema::findOrFail($id);

        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'data_identificacao' => 'required|date',
            'problema' => 'required|string|max:255',
            'evolucao' => 'required|string',
        ]);

        $problema->update($request->all());
        return redirect()->route('problema.index')->with('atualizacao', 'Problema atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
