<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 29/11/18
 * Time: 09:14
 */

namespace Usuario\Service\Factory;


use Interop\Container\ContainerInterface;
use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Authentication\Result;
use Zend\Authentication\Storage\Session;
use Zend\Db\Adapter\AdapterInterface;


class AuthenticationServiceFactory implements AuthenticationServiceInterface
{
    //pegar adaptador de banco de dados
    //configurar um adaptador para administrar a autenticação do usuário
    //cria a sessão para guardamos o usuário
    //criar o serviço de AuthenticationService
    public function __invoke(ContainerInterface $container)
    {
        $dbAdapter = $container->get(AdapterInterface::class);
        $authAdapter = new CallbackCheckAdapter($dbAdapter, 'usuario', 'email', 'senha', null);
        $storage = new Session();
        return new AuthenticationService($storage, $authAdapter);
    }

    /**
     * Authenticates and provides an authentication result
     *
     * @return Result
     */
    public function authenticate()
    {
        // TODO: Implement authenticate() method.
    }

    /**
     * Returns true if and only if an identity is available
     *
     * @return bool
     */
    public function hasIdentity()
    {
        // TODO: Implement hasIdentity() method.
    }

    /**
     * Returns the authenticated identity or null if no identity is available
     *
     * @return mixed|null
     */
    public function getIdentity()
    {
        // TODO: Implement getIdentity() method.
    }

    /**
     * Clears the identity
     *
     * @return void
     */
    public function clearIdentity()
    {
        // TODO: Implement clearIdentity() method.
    }
}
