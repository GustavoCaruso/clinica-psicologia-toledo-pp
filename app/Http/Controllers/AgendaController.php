<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Agenda;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        
        $pacientesId = Paciente::where('user_id', $userId)->pluck('id');
        
       
        $agendas = Agenda::whereIn('paciente_id', $pacientesId)->get();

        return view("agenda.index", compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::id();
        
        $pacientes = Paciente::where('user_id', $userId)->get();
        
        return view("agenda.create", compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'data_agendamento' => 'required|date',
            'hora_agendamento' => 'required|date_format:H:i',
        ]);

        
        Agenda::create($request->all());

        return redirect()->route('agenda.index')->with('insercao', 'Agendamento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $agenda = Agenda::findOrFail($id);

        return view("agenda.show", compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $agenda = Agenda::findOrFail($id);

        
        $userId = Auth::id();
        $pacientes = Paciente::where('user_id', $userId)->get();

        return view("agenda.edit", compact('agenda', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Busca o agendamento específico pelo ID
        $agenda = Agenda::findOrFail($id);

        
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'data_agendamento' => 'required|date',
            'hora_agendamento' => 'required|date_format:H:i',
        ]);

      
        $agenda->update($request->all());

        return redirect()->route('agenda.index')->with('atualizacao', 'Agendamento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
 
        
    }
    
}
