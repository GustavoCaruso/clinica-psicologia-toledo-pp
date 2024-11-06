<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;
class Problema extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'paciente_id',
        'data_identificacao',
        'problema',
        'evolucao'
    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
