<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terapia;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;

class TerapiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $pacientes = Paciente::where('user_id', $userId)->get();
        $pacientesId = $pacientes->pluck('id');
        $terapias = Terapia::whereIn('paciente_id', $pacientesId)->get();
        return view('terapia.index', compact('terapias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::id();
        $pacientes = Paciente::where('user_id', $userId)->get();
        return view('terapia.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'data_sessao' => 'required|date',
            'notas' => 'required|string',
            'tecnicas_utilizadas' => 'required|string',
        ]);

        Terapia::create($request->all());
        return redirect()->route('terapia.index')->with('insercao', 'Sessão de terapia criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $terapia = Terapia::findOrFail($id);
        return view('terapia.show', compact('terapia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $terapia = Terapia::findOrFail($id);
        $userId = Auth::id();
        $pacientes = Paciente::where('user_id', $userId)->get();
        return view('terapia.edit', compact('terapia', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $terapia = Terapia::findOrFail($id);

        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'data_sessao' => 'required|date',
            'notas' => 'required|string',
            'tecnicas_utilizadas' => 'required|string',
        ]);

        $terapia->update($request->all());
        return redirect()->route('terapia.index')->with('atualizacao', 'Sessão de terapia atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
    }
}
