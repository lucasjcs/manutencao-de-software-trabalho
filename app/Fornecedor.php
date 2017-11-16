<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
	protected $fillable = ['nome', 'email', 'cpf'];
    public function compras(){
        return $this->hasMany("App\Venda");
    }
}
