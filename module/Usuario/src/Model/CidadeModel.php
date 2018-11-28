<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 28/11/18
 * Time: 13:27
 */

namespace Usuario\Model;

class CidadeModel
{
    public $codigo;
    public $codigo_estado;
    public $nome;

    public function exchangeArray(array $data)
    {
        $this->codigo  = !empty($data['codigo']) ? $data['codigo'] : null;
        $this->codigo_estado  = !empty($data['codigo_estado']) ? $data['codigo_estado'] : null;
        $this->nome  = !empty($data['nome']) ? $data['nome'] : null;
    }

    public function getArrayCopy()
    {
        return [
            'codigo' => $this->codigo,
            'codigo_estado' => $this->codigo_estado,
            'nome' => $this->nome,
        ];
    }

}