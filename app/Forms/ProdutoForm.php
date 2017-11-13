<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ProdutoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text')
            ->add('preco', 'number')
            ->add('quantidade', 'number')
            ->add('enviar', 'submit', [
                'attr'=>[
                    'class'=>'btn btn-primary btn-lg btn-block'
                ]
            ]);
    }
}
