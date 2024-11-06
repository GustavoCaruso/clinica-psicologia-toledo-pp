<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;

class AvaliacaoPsicologica extends Model
{
    use HasFactory;

    protected $fillable = ['observacoes', 
    'data_avaliacao', 
    'paciente_id'];

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
