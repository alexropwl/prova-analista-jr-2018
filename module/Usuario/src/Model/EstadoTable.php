<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 28/11/18
 * Time: 11:06
 */

namespace Usuario\Model;

use Zend\Db\TableGateway\TableGatewayInterface;


class EstadoTable
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


}