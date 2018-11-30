<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Usuario\Controller;

use Usuario\Form\LoginForm;
use Usuario\Form\UsuarioForm;
use Usuario\Model\CidadeTable;
use Usuario\Model\EstadoTable;
use Usuario\Model\UsuarioModel;
use Usuario\Model\UsuarioTable;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter;

class UsuarioController extends AbstractActionController
{
    /**
     * @var UsuarioTable
     */
    private $usuarioTable;
    /**
     * @var EstadoTable
     */
    private $estadoTable;

    /**
     * @var CidadeTable
     */
    private $cidadeTable;

    /**
     * @var AuthenticationService
     */
    private $authService;

    public function __construct(UsuarioTable $usuarioTable, EstadoTable $estadoTable, CidadeTable $cidadeTable,
 AuthenticationServiceInterface $authService)
    {
        $this->usuarioTable = $usuarioTable;
        $this->estadoTable = $estadoTable;
        $this->cidadeTable = $cidadeTable;
        $this->authService = $authService;
    }

    public function indexAction()
    {
       $usuarios = $this->usuarioTable->fetchAll();


        return new ViewModel([
            'usuarios'=>$usuarios
        ]);
    }

    public function adminAction()
    {
        if(!$this->authService->hasIdentity())
        {
          return $this->redirect()->toRoute('usuario');
        }
    }

    public function loginAction()
   {
       if ($this->authService->hasIdentity()):
           return $this->redirect()->toRoute('admin');
       endif;

       $messageError = null;

       $form = new LoginForm();
       $form->get('submit')->setValue('Logar');

       /** @var Request $request */
       $request = $this->getRequest();
       if ($request->isPost()):

           $form->setData($request->getPost());

           if ($form->isValid()):

               $formData = $form->getData();

               /** @var AbstractAdapter $authAdapter */
               $authAdapter = $this->authService->getAdapter();
               $authAdapter->setIdentity($formData['email']);
               $authAdapter->setCredential(md5($formData['senha']));

               $result = $authAdapter->authenticate();
               if ($result->isValid()):
                   return $this->redirect()->toRoute('admin');
               else:
                    $messageError = 'Login recusado';
               endif;
           endif;
       endif;

       return new ViewModel([
           'form' => $form,
           'messageError' =>$messageError
       ]);
   }
    public function logoutAction()
    {
        $this->authService->clearIdentity();

        return $this->redirect()->toRoute('usuario');
    }

    public function addAction()
    {
        $form = new UsuarioForm();
        $form->get('submit')->setValue('Add Usuario');

        $request = $this->getRequest();

        if(!$request->isPost())
        {
            return ['form' =>$form, 'estados' => $this->estadoTable->fetchAll(), 'cidades'=> $this->cidadeTable->fetchAll()];
        }

        $form->setData($request->getPost());

        if(!$form->isValid())
        {
            return ['form' =>$form, 'estados' => $this->estadoTable->fetchAll(), 'cidades'=> $this->cidadeTable->fetchAll()];
        }

        $usuario = new UsuarioModel();
        $usuario->exChangeArray($form->getData());
        $this->usuarioTable->saveUsuario($usuario);

        return $this->redirect()->toRoute('usuario');

    }
}
