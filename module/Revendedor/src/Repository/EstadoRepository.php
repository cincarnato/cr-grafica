<?php

namespace Revendedor\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * EstadoRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class EstadoRepository extends EntityRepository
{

    public function save(\Revendedor\Entity\Estado $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Revendedor\Entity\Estado $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

