<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encaminhamento;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;

class EncaminhamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $pacientes = Paciente::where('user_id', $userId)->get();
        $pacientesId = $pacientes->pluck('id');
        $encaminhamentos = Encaminhamento::whereIn('paciente_id', $pacientesId)->get();
        return view('encaminhamento.index', compact('encaminhamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::id();
        $pacientes = Paciente::where('user_id', $userId)->get();
        return view('encaminhamento.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'data_encaminhamento' => 'required|date',
            'profissional_encaminhado' => 'required|string|max:255',
            'descricao_encaminhamento' => 'required|string',
        ]);

        Encaminhamento::create($request->all());
        return redirect()->route('encaminhamento.index')->with('insercao', 'Encaminhamento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $encaminhamento = Encaminhamento::findOrFail($id);
        return view('encaminhamento.show', compact('encaminhamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $encaminhamento = Encaminhamento::findOrFail($id);
        $userId = Auth::id();
        $pacientes = Paciente::where('user_id', $userId)->get();
        return view('encaminhamento.edit', compact('encaminhamento', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $encaminhamento = Encaminhamento::findOrFail($id);

        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'data_encaminhamento' => 'required|date',
            'profissional_encaminhado' => 'required|string|max:255',
            'descricao_encaminhamento' => 'required|string',
        ]);

        $encaminhamento->update($request->all());
        return redirect()->route('encaminhamento.index')->with('atualizacao', 'Encaminhamento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
