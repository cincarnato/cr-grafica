<?php

namespace Cr\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ClienteRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class ClienteRepository extends EntityRepository
{

    public function save(\Cr\Entity\Cliente $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Cr\Entity\Cliente $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

