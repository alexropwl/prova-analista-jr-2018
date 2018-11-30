<?php

namespace Usuario\Controller\Factory;

use Interop\Container\ContainerInterface;
use Usuario\Controller\UsuarioController;
use Usuario\Model;
use Zend\Authentication\AuthenticationService;


class UsuarioControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new UsuarioController(
            $container->get(Model\UsuarioTable::class),
            $container->get(Model\EstadoTable::class),
            $container->get(Model\CidadeTable::class),
            $container->get(AuthenticationService::class)
        );
    }
}