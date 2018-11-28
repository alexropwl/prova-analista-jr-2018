<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 28/11/18
 * Time: 13:27
 */

namespace Usuario\Model;

class EstadoModel
{
    public $codigo;
    public $sigla;
    public $nome;

    public function exchangeArray(array $data)
    {
        $this->codigo  = !empty($data['codigo']) ? $data['codigo'] : null;
        $this->sigla  = !empty($data['sigla']) ? $data['sigla'] : null;
        $this->nome  = !empty($data['nome']) ? $data['nome'] : null;
    }

    public function getArrayCopy()
    {
        return [
            'codigo' => $this->codigo,
            'sigla' => $this->sigla,
            'nome' => $this->nome,
                ];
    }

}