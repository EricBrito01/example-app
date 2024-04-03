<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Candidato extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'candidatos';

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'nome',
        'cpf',
        'logradouro',
    ];

    /**
     * Create a new Candidato instance.
     *
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        Carbon::setLocale('pt-BR');
    }


    public function formatCPF()
    {
        $cpf = preg_replace('/[^0-9]/', '', $this->cpf);
        if (strlen($cpf) != 11) {
            return 'CPF inválido';
        }

        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
    }
}
