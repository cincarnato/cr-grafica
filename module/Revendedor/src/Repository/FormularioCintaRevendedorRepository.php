<?php

namespace Revendedor\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * FormularioCintaRevendedorRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class FormularioCintaRevendedorRepository extends EntityRepository
{

    public function save(\Revendedor\Entity\FormularioCintaRevendedor $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Revendedor\Entity\FormularioCintaRevendedor $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

