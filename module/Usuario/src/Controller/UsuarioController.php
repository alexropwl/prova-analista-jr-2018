<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Usuario\Controller;

use Usuario\Form\UsuarioForm;
use Usuario\Model\CidadeTable;
use Usuario\Model\EstadoModel;
use Usuario\Model\EstadoTable;
use Usuario\Model\UsuarioModel;
use Usuario\Model\UsuarioTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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

    public function __construct(UsuarioTable $usuarioTable, EstadoTable $estadoTable, CidadeTable $cidadeTable)
    {
        $this->usuarioTable = $usuarioTable;
        $this->estadoTable = $estadoTable;
        $this->cidadeTable = $cidadeTable;
    }

    public function indexAction()
    {
        return new ViewModel();
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

        if(!$form->isValid() )
        {
            return ['form' => $form];
        }
        $usuario = new UsuarioModel();

        $usuario->exChangeArray($form->getData());

        $this->usuarioTable->saveUsuario($usuario);


        return $this->redirect()->toRoute('usuario');


        /**


        if(!$request->isPost())
        {
            return ['form' =>$form];
        }

        $form->setData($request->getPost());
        if(!$form->isValid() )
        {
            return ['form' => $form];
        }

        $usuario = new UsuarioModel();

        $usuario->exChangeArray($form->getData());

        $this->table->save($usuario);

        return $this->redirect()->toRoute('usuario');

        */
    }
}
