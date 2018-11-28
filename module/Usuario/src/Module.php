<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Usuario;

use Usuario\Controller\UsuarioController;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;


class Module implements ConfigProviderInterface
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\UsuarioTable::class => function($container) {
               $tableGateway = $container->get(Model\UsuarioTableGateway::class);
                    return new Model\UsuarioTable($tableGateway);
                },

                Model\UsuarioTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\UsuarioModel());
                    return new TableGateway('usuario', $dbAdapter, null, $resultSetPrototype);
                },

                Model\EstadoTable::class => function($container) {
                    $tableGateway = $container->get(Model\EstadoTableGateway::class);
                    return new Model\EstadoTable($tableGateway);
                },

                Model\EstadoTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\EstadoModel());
                    return new TableGateway('estado', $dbAdapter, null, $resultSetPrototype);
                },

                Model\CidadeTable::class => function($container) {
                    $tableGateway = $container->get(Model\CidadeTableGateway::class);
                    return new Model\CidadeTable($tableGateway);
                },

                Model\CidadeTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\CidadeModel());
                    return new TableGateway('cidade', $dbAdapter, null, $resultSetPrototype);
                },



            ],
        ];
    }
    public function getControllerConfig()
    {
        return [
            'factories' => [
                UsuarioController::class => function($container){
                    return new Controller\UsuarioController(
                        $container->get(Model\UsuarioTable::class),
                        $container->get(Model\EstadoTable::class),
                        $container->get(Model\CidadeTable::class)

                    );
                }
            ]
        ];
    }

}
