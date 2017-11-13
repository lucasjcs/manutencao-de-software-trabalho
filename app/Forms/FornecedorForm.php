<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class FornecedorForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text')
            ->add('email', 'email')
            ->add('enviar', 'submit', [
                'attr'=>[
                    'class'=>'btn btn-primary btn-lg btn-block'
                ]
            ]);
    }
}
