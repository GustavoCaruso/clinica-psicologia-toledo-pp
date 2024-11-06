<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diagnosticos = Diagnostico::with('paciente')->get();
        return view('diagnostico.index', compact('diagnosticos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::all(); // Lista todos os pacientes para selecionar no diagnóstico
        return view('diagnostico.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'data_diagnostico' => 'required|date',
            'diagnostico' => 'required|string|max:255',
            'descricao' => 'nullable|string'
        ]);

        Diagnostico::create($request->all());

        return redirect()->route('diagnostico.index')->with('success', 'Diagnóstico criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $diagnostico = Diagnostico::with('paciente')->findOrFail($id);
        return view('diagnostico.show', compact('diagnostico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $diagnostico = Diagnostico::findOrFail($id);
        $pacientes = Paciente::all();
        return view('diagnostico.edit', compact('diagnostico', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'data_diagnostico' => 'required|date',
            'diagnostico' => 'required|string|max:255',
            'descricao' => 'nullable|string'
        ]);

        $diagnostico = Diagnostico::findOrFail($id);
        $diagnostico->update($request->all());

        return redirect()->route('diagnostico.index')->with('success', 'Diagnóstico atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
    }
}
