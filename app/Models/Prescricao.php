<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescricao extends Model
{
    use HasFactory;

    
    protected $table = 'prescricoes'; 


    protected $fillable = [
        'paciente_id',
        'data_prescricao',
        'descricao_prescricao',
    ];


    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
