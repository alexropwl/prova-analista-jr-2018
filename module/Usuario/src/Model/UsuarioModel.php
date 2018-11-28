<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 28/11/18
 * Time: 10:45
 */

namespace Usuario\Model;


class UsuarioModel
{
    public $email;
    public $nome;
    public $senha;
    public $telefone;
    public $logradouro;
    public $numero;
    public $complemento;
    public $bairro;
    public $codigo_cidade;
    public $cep;

    public function exchangeArray(array $data)
    {
       $this->email  = !empty($data['email']) ? $data['email'] : null;
       $this->nome  = !empty($data['nome']) ? $data['nome'] : null;
       $this->senha  = !empty($data['senha']) ? $data['senha'] : null;
       $this->telefone  = !empty($data['telefone']) ? $data['telefone'] : null;
       $this->logradouro  = !empty($data['logradouro']) ? $data['logradouro'] : null;
       $this->numero  = !empty($data['numero']) ? $data['numero'] : null;
       $this->complemento  = !empty($data['complemento']) ? $data['complemento'] : null;
       $this->bairro  = !empty($data['bairro']) ? $data['bairro'] : null;
       $this->codigo_cidade  = !empty($data['codigo_cidade']) ? $data['codigo_cidade'] : null;
       $this->cep  = !empty($data['cep']) ? $data['cep'] : null;
    }

    public function getArrayCopy()
    {
        return ['email' => $this->email,
            'nome' => $this->nome,
            'senha' => $this->senha,
            'telefone' => $this->telefone,
            'logradouro' => $this->logradouro,
            'numero' => $this->numero,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'codigo_cidade' => $this->codigo_cidade,
            'cep' => $this->cep,

        ];
    }

}