<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Tratamento;
use App\Models\Prescricao;
use App\Models\Terapia;

class DashboardController extends Controller
{
    /**
     * Exibe o dashboard com informações resumidas.
     */
    public function index()
    {
        
        $totalPacientes = Paciente::count();
        $totalTratamentos = Tratamento::count();
        $totalPrescricoes = Prescricao::count();
        $totalTerapias = Terapia::count();

        
        $recentTratamentos = Tratamento::orderBy('data_inicio', 'desc')->limit(5)->get();

       
        return view('dashboard', compact('totalPacientes', 'totalTratamentos', 'totalPrescricoes', 'totalTerapias', 'recentTratamentos'));
    }
}
