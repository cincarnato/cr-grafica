<?php

namespace Cr\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MedidaRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class MedidaRepository extends EntityRepository
{

    public function save(\Cr\Entity\Medida $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Cr\Entity\Medida $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

