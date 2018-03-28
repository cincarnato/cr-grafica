<?php

namespace Cr\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CantidadPrecioRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class CantidadPrecioRepository extends EntityRepository
{

    public function save(\Cr\Entity\CantidadPrecio $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Cr\Entity\CantidadPrecio $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

