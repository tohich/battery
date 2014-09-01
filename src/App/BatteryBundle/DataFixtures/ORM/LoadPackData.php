<?php

namespace App\BatteryBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use App\BatteryBundle\Entity\Pack;

class LoadPackData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $packOne = new Pack();
        $packOne->setType($em->merge($this->getReference('type-AA')));
        $packOne->setCount(3);

        $packTwo = new Pack();
        $packTwo->setType($em->merge($this->getReference('type-AAA')));
        $packTwo->setCount(5);

        $packThree = new Pack();
        $packThree->setType($em->merge($this->getReference('type-AAA')));
        $packThree->setCount(1);

        $packFour = new Pack();
        $packFour->setType($em->merge($this->getReference('type-AAA')));
        $packFour->setCount(7);

        $em->persist($packOne);
        $em->persist($packTwo);
        $em->persist($packThree);
        $em->persist($packFour);
        $em->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}