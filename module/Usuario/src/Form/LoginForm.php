<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 28/11/18
 * Time: 09:25
 */

namespace Usuario\Form;


use Zend\Form\Form;

class LoginForm extends Form
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
                'required' => 'required',
                'id' => 'email'
            ]
        ]);

        $this->add([
            'name' => 'senha',
            'type' => 'password',
            'options' => [
                'label' => 'Senha*'
            ],
            'attributes' => [
                'required' => 'required',
                'id' => 'senha'
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Logar',
                'id' => 'submitLog'
            ]
        ]);

    }
}




