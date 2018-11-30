<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 28/11/18
 * Time: 11:06
 */

namespace Usuario\Model;

use Zend\Db\TableGateway\TableGatewayInterface;


class UsuarioTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function saveUsuario(UsuarioModel $usuario)
    {
        $data = [
            'email' => $usuario->email,
            'nome' => $usuario->nome,
            'telefone' => $usuario->telefone,
            'logradouro' => $usuario->logradouro,
            'numero' => $usuario->numero,
            'complemento' => $usuario->complemento,
            'bairro' => $usuario->bairro,
            'codigo_cidade' => $usuario->codigo_cidade,
            'cep' => $usuario->cep,
            'senha' => md5($usuario->senha),
        ];

        $this->tableGateway->insert($data);


    }

}