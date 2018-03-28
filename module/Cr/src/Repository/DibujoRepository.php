<?php

namespace Cr\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * DibujoRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class DibujoRepository extends EntityRepository
{

    public function save(\Cr\Entity\Dibujo $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Cr\Entity\Dibujo $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

