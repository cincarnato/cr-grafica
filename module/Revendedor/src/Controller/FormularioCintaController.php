<?php

namespace Revendedor\Controller;

use Doctrine\ORM\Internal\Hydration\ObjectHydrator;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use DoctrineORMModule\Service\DoctrineObjectHydratorFactory;
use Revendedor\Entity\FormularioCinta;
use Revendedor\Form\EstadoPedidoCinta;
use Zend\Mvc\Controller\AbstractActionController;
use ZfMetal\Mail\MailManager;
use ZfMetal\Security\Entity\User;

/**
 * FormularioCintaController
 * 
 * 
 * 
 * @author
 * @license
 * @link
 */
class FormularioCintaController extends AbstractActionController
{

    const ENTITY = '\\Revendedor\\Entity\\FormularioCinta';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    /**
     * @var \ZfMetal\Datagrid\Grid
     */
    public $grid = null;

    public function getEm()
    {
        return $this->em;
    }

    public function setEm(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function getEntityRepository()
    {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em, \ZfMetal\Datagrid\Grid $grid)
    {
        $this->em = $em;
         $this->grid = $grid;
    }

    public function getGrid()
    {
        return $this->grid;
    }

    public function setGrid(\ZfMetal\Datagrid\Grid $grid)
    {
        $this->grid = $grid;
    }

    public function gridAction()
    {

        $user = $this->identity();
        if(!$user->hasRole("admin")) {
            $this->grid->getSource()->getQb()->where("u.usuario = :user")->setParameter("user", $user->getId());
        }




        $this->grid->prepare();

        return array("grid" => $this->grid);
    }


    public function finalizarAction()
    {
        $id = $this->params("id");
        /** @var FormularioCinta $formularioCinta */
        $formularioCinta = $this->getEntityRepository()->find($id);
        $formularioCinta->setListo(true);
        $this->getEm()->persist($formularioCinta);
        $this->getEm()->flush();
        $this->flashmessenger()->addSuccessMessage("Se finalizo el pedido ". $id. " con exito");
        $this->redirect()->toRoute("Revendedor/FormularioCinta/Grid");
    }


    public function viewAction()
    {
        $id = $this->params("id");
        $formularioCinta = $this->getEntityRepository()->find($id);
        $form = new EstadoPedidoCinta($this->getEm());
        $form->setHydrator(new DoctrineObject($this->getEm()));

        $form->bind($formularioCinta);

        if($this->getRequest()->isPost()){

            $form->setData($this->getRequest()->getPost());

            if($form->isValid()){

                $this->getEm()->persist($formularioCinta);
                $this->getEm()->flush();
            }

        }


        return ["fc" => $formularioCinta, "form" => $form];
    }


}

