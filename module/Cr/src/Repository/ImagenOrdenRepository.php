<?php

namespace Cr\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ImagenOrdenRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class ImagenOrdenRepository extends EntityRepository
{

    public function save(\Cr\Entity\ImagenOrden $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Cr\Entity\ImagenOrden $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

