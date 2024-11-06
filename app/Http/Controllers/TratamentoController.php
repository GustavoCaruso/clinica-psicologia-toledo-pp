<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tratamento;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;

class TratamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $pacientes = Paciente::where('user_id', $userId)->get();
        $pacientesId = $pacientes->pluck('id');
        $tratamentos = Tratamento::whereIn('paciente_id', $pacientesId)->get();
        
        return view('tratamento.index', compact('tratamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::id();
        $pacientes = Paciente::where('user_id', $userId)->get();
        
        return view('tratamento.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'data_inicio' => 'required|date',
            'objetivos' => 'required|string',
            'progresso' => 'required|string',
        ]);

        Tratamento::create($request->all());
        
        return redirect()->route('tratamento.index')->with('insercao', 'Tratamento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tratamento = Tratamento::findOrFail($id);
        
        return view('tratamento.show', compact('tratamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tratamento = Tratamento::findOrFail($id);
        $userId = Auth::id();
        $pacientes = Paciente::where('user_id', $userId)->get();
        
        return view('tratamento.edit', compact('tratamento', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tratamento = Tratamento::findOrFail($id);

        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'data_inicio' => 'required|date',
            'objetivos' => 'required|string',
            'progresso' => 'required|string',
        ]);

        $tratamento->update($request->all());
        
        return redirect()->route('tratamento.index')->with('atualizacao', 'Tratamento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
    }
}
