<?php

namespace Revendedor\Controller;

use Revendedor\Entity\FormularioCinta;
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

            //Admin cant change de form
            //$this->grid->getOptions()->getCrudConfig()->getEdit()->setEnable(false);
        }else{
            $this->grid->addExtraColumn("Finalizar", "<a href='/revendedor/formulario-cinta/finalizar/{{id}}' class='btn'>Finalizar</a>");
        }

        /** @var MailManager $mailManager */
        $mailManager = $this->mailManager();
        $this->getEventManager()->attach("saveRecord_post", function ($e) use ($mailManager) {
            $record = $e->getParam("record");
            $usuario = $record->getUsuario()->getUsername();
            $id = $record->getId();
            $mailManager->setFrom("ci.sys.virtual@gmail.com");
            $mailManager->addBcc("cristian.cdi@gmail.com");
            $mailManager->addTo("cristiansapir@hotmail.com");
            $mailManager->setSubject("Nuevo pedido de Revendedor");
            $mailManager->setBody("Se ha registrado un nuevo pedido con ID <b>". $id ."</b> de revendedor del usuario <b>". $usuario."</b>");
            $mailManager->send();
        });



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
        return ["fc" => $formularioCinta];
    }


}

