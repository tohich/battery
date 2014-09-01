<?php

namespace App\BatteryBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use App\BatteryBundle\Entity\Type;

class LoadTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $typeAA = new Type();
        $typeAA->setName('AA');

        $typeAAA = new Type();
        $typeAAA->setName('AAA');

        $typeC = new Type();
        $typeC->setName('C');

        $typeD = new Type();
        $typeD->setName('D');

        $typeOther = new Type();
        $typeOther->setName('Other');

        $em->persist($typeAA);
        $em->persist($typeAAA);
        $em->persist($typeC);
        $em->persist($typeD);
        $em->persist($typeOther);
        $em->flush();
        $this->addReference('type-AA', $typeAA);
        $this->addReference('type-AAA', $typeAAA);
        $this->addReference('type-C', $typeC);
        $this->addReference('type-D', $typeD);
        $this->addReference('type-other', $typeOther);
    }

    public function getOrder()
    {
        return 1;
    }
}