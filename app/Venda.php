<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = ['produto_id', 'fornecedor_id', 'quantidade'];
    protected $with = ['produto', 'fornecedor'];


    public function realizarVenda($produto, $quantidade, $fornecedor){
        if($produto->quantidade <= $quantidade){
            return false;
        }

        $produto->quantidade -= $quantidade;
        $produto->save();

        $this->produto()->associate($produto);
        $this->fornecedor()->associate($fornecedor);
        $this->quantidade = $quantidade;
        $this->save();
        return true;
    }

    public function produto(){
        return $this->belongsTo('App\Produto');
    }

    public function fornecedor(){
        return $this->belongsTo('App\Fornecedor');
    }
}
