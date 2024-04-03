<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Selecao extends Model
{
   use HasFactory, SoftDeletes;
   protected $table = 'selecao';

   /**
    * @var array
    */
   protected $dates = ['created_at', 'updated_at', 'deleted_at'];

   protected $fillable = [
      'nome',
      'fk_clienteId',
      'fk_candidatoId',
   ];

   public function cliente()
   {
      return $this->belongsTo(Cliente::class, 'fk_clienteId');
   }

   public function candidato()
   {
      return $this->belongsTo(Candidato::class, 'fk_candidatoId');
   }
}
