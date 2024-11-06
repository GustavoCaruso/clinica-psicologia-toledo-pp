<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\AvaliacaoPsicologica;
use Illuminate\Support\Facades\Auth;

class AvaliacaoPsicologicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $pacientes = Paciente::where('user_id', $userId)->get();
        $pacientesId = $pacientes->pluck('id');
        $avaliacoes = AvaliacaoPsicologica::whereIn('paciente_id', $pacientesId)->get();
        return view("avaliacao.index", compact('avaliacoes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId=Auth::id();
        $pacientes = Paciente::where('user_id', $userId)->get();
        return view("avaliacao.create", compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        AvaliacaoPsicologica::create($request->all());
        return redirect()->route('avaliacao.index')->with('insercao', 'Inseriso com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $avaliacao = AvaliacaoPsicologica::findOrFail($id); 
        return view("avaliacao.show", compact('avaliacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $avaliacao = AvaliacaoPsicologica::findOrFail($id);
        $userId = Auth::id();
        $pacientes = Paciente::where('user_id', $userId)->get(); // Carregar os pacientes do usuário
        return view("avaliacao.edit", compact('avaliacao', 'pacientes'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $avaliacao = AvaliacaoPsicologica::findOrFail($id);
        $avaliacao->update($request->all());
        return redirect()->route('avaliacao.index', $id)->with('atualizacao', 'Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      
    }
}
