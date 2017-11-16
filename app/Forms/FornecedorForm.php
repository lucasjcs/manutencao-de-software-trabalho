<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class FornecedorForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text',[
                'label'=>'Nome',
                'rules'=>'required',
                'error_messages' => [
                    'quantidade.required' => 'A quantidade é obrigatória',
                    'quantidade.numeric'=>'O quantidade deve ser um número'
                    ]
                ])
            ->add('email', 'text',
                [
                    'label'=>'E-mail',
                    'rules'=>'required|email_address',
                    'error_messages' => [
                        'email.required' => 'A e-mail é obrigatória',
                        'email.email'=>'É um e-mail!'
                    ]
            ])
            ->add('cpf', 'text',
                [
                    'label'=>'CPF',
                    'rules'=>'required'
                ])
            ->add('enviar', 'submit', [
                'attr'=>[
                    'class'=>'btn btn-primary btn-lg btn-block'
                ]
            ]);
    }
}
