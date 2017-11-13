<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'preco', 'quantidade'];
    
    public function vendas(){
        return $this->hasMany("App\Venda");
    }
}
