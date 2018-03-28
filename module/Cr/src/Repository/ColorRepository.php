<?php

namespace Cr\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ColorRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class ColorRepository extends EntityRepository
{

    public function save(\Cr\Entity\Color $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Cr\Entity\Color $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

