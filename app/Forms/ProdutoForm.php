<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ProdutoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text', [
                'label'=>'Nome',
                'rules'=>'required',
                'error_messages' => [
                    'nome.required' => 'O nome é obrigatório!'
                ]
            ])
            ->add('preco', 'text', [
                'label'=>'Preço',
                'rules'=>'required|numeric',
                'error_messages' => [
                    'preco.required' => 'O preço é obrigatório',
                    'preco.numeric'=>'O preço deve ser um número'
                ]
            ])
            ->add('quantidade', 'text',  [
                'label'=>'Quantidade',
                'rules'=>'required|numeric',
                'error_messages' => [
                    'quantidade.required' => 'A quantidade é obrigatória',
                    'quantidade.numeric'=>'O quantidade deve ser um número'
                ]
            ])
            ->add('enviar', 'submit', [
                'attr'=>[
                    'class'=>'btn btn-primary btn-lg btn-block'
                ]
            ]);
    }
}
