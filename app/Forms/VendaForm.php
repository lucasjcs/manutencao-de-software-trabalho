<?php

namespace App\Forms;

use App\Fornecedor;
use App\Produto;
use Kris\LaravelFormBuilder\Form;

class VendaForm extends Form
{
    public function buildForm()
    {
        $fornecedores = array();
        foreach(Fornecedor::all() as $fornecedor){
            $fornecedores[$fornecedor->id] = $fornecedor->nome;
        }

        $produtos = array();
        foreach(Produto::all() as $produto){
            $produtos[$produto->id] = $produto->nome;
        }

        $this
            ->add('fornecedor_id', 'select',[
                'label'=>'Fornecedor: ',
                'choices'=>$fornecedores
            ])
            ->add('produto_id', 'select', [
                'label'=>'Produto: ',
                'choices'=>$produtos
            ])
            ->add('quantidade', 'number')
            ->add('vender', 'submit', [
                'attr'=>[
                    'class'=>'btn btn-primary btn-lg btn-block'
                ]
            ]);
    }
}
