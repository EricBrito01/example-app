<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cliente';

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'razaoSocial',
        'cnpj',
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

    public function formatCNPJ()
    {
        $cnpj = preg_replace('/[^0-9]/', '', $this->cnpj);
        if (strlen($cnpj) != 14) {
            return 'CNPJ inválido';
        }

        return substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4) . '-' . substr($cnpj, 12, 2);
    }
}
