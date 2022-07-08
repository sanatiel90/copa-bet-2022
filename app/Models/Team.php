<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_name',
        'picture_url'
    ];

    //essa prop faz com que qualquer retorno à consulta de Team tbm ja venha automaticamente
    //com os dados correspondentes de players; evitando devido a erro de excesso de consumo de memoria
    //protected $with = ['players'];

    public function players(){
        return $this->hasMany(Player::class);
    }
}
