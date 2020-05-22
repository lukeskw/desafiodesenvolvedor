<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    const SEXO_MASCULINO = 'M';
    const SEXO_FEMININO = 'F';

    public static $sexo = [
        self::SEXO_MASCULINO => 'Masculino',
        self::SEXO_FEMININO => 'Feminino',
    ];

    protected $fillable = [
        'name',
        'data_nascimento',
        'sexo',
    ];

    public function setDataNascimentoAttribute($dataNascimento)
    {
        $this->attributes['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $dataNascimento)->format('Y-m-d');
    }

    public function getDataNascimentoStringAttribute()
    {
        return !empty($this->data_nascimento) ? (new Carbon($this->data_nascimento))->format('d/m/Y') : null;
    }
}
