<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 28/11/18
 * Time: 09:25
 */

namespace Usuario\Form;


use Zend\Form\Form;

class UsuarioForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('usuario');

        $this->add([
            'name' => 'email',
            'type' => 'email',
            'options' => [
                'label' => 'Email*'
            ],
            'attributes' => [
                'required' => 'required'
            ]
        ]);
        $this->add([
            'name' => 'nome',
            'type' => 'text',
            'options' => [
                'label' => 'Nome*'
            ],
            'attributes' => [
                'required' => 'required'
            ]
        ]);

        $this->add([
            'name' => 'senha',
            'type' => 'password',
            'options' => [
                'label' => 'Senha*'
            ],
            'attributes' => [
                'required' => 'required'
            ]
        ]);

        $this->add([
            'name' => 'telefone',
            'type' => 'text',
            'options' => [
                'label' => 'Telefone*'
            ],
            'attributes' => [
                'required' => 'required'
            ]
        ]);
        $this->add([
            'name' => 'logradouro',
            'type' => 'text',
            'options' => [
                'label' => 'Logradouro*'
            ],
            'attributes' => [
                'required' => 'required'
            ]
        ]);
        $this->add([
            'name' => 'numero',
            'type' => 'number',
            'options' => [
                'label' => 'Numero*'
            ],
            'attributes' => [
                'required' => 'required'
            ]
        ]);
        $this->add([
            'name' => 'complemento',
            'type' => 'text',
            'options' => [
                'label' => 'Complemento*'
            ],
            'attributes' => [
                'required' => 'required'
            ]
        ]);
        $this->add([
            'name' => 'bairro',
            'type' => 'text',
            'options' => [
                'label' => 'Bairro *'
            ],
            'attributes' => [
                'required' => 'required'
            ]
        ]);
        $this->add([
            'name' => 'cidade',
            'type' => 'select',
            'options' => [
                'label' => 'Cidade',
                'disable_inarray_validator' => true,
            ],
            'attributes' => [
                'required' => 'required'
            ]
        ]);

        $this->add([
            'name' => 'estado',
            'type' => 'select',
            'options' => [
            'label' => 'Estado',
            'disable_inarray_validator' => true,

            ],
            'attributes' => [
                'required' => 'required'
            ]
        ]);

        $this->add([
            'name' => 'cep',
            'type' => 'text',
            'options' => [
                'label' => 'Cep*'
            ],
            'attributes' => [
                'required' => 'required'
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Logar',
                'id' => 'submitbutton'
            ]
        ]);

    }
}




