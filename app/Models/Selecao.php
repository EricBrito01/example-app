<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selecao extends Model
{
    use HasFactory;
    protected $table = 'selecao';

    public function cliente(){
       return $this->belongsTo(Cliente::class,'fk_clienteId');
    }

    public function candidato(){
        return $this->belongsTo(Candidato::class,'fk_candidatoId');
     }
}
