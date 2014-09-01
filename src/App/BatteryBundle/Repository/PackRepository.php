<?php

namespace App\BatteryBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PackRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PackRepository extends EntityRepository
{
    public function getStatistics()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('
            SELECT t.name, SUM(p.count) as count_sum
            FROM AppBatteryBundle:Pack p
            JOIN p.type t
            GROUP BY p.type
        ');
        return $query->getResult();
    }
}