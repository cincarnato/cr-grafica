<?php

namespace Revendedor\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * FormularioCintaRepository
 * 
 * 
 * 
 * @author
 * @license
 * @link
 */
class FormularioCintaRepository extends EntityRepository
{

    public function save(\Revendedor\Entity\FormularioCinta $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Revendedor\Entity\FormularioCinta $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

