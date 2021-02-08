<?php

namespace App\DataFixtures;

use App\Entity\SchoolClass;
use App\Entity\Schools;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $nfactory = new Schools();
        $nfactory->setName('NFactory');
        $nfactory->setAdress('Saint Marc 1');
        $nfactory->setPhone(02357523);
        $manager->persist($nfactory);

        $iscom = new Schools();
        $iscom->setName('ISCOM');
        $iscom->setAdress('Saint Marc 2');
        $iscom->setPhone(01234567);
        $manager->persist($iscom);

        $pigier = new Schools();
        $pigier->setName('Pigier');
        $pigier->setAdress('Saint Marc 3');
        $pigier->setPhone(0123456);
        $manager->persist($pigier);

        for($i=0;$i<5;$i++)
        {
            $schoolClass = new SchoolClass();
            $schoolClass->setClassName('BCI '.$i);
            $schoolClass->setClassSize($i);
            $schoolClass->setSchoolHasClasses($nfactory);
            $manager->persist($schoolClass);
        }

        for($i=0;$i<5;$i++)
        {
            $schoolClass = new SchoolClass();
            $schoolClass->setClassName('COMM '.$i);
            $schoolClass->setClassSize($i);
            $schoolClass->setSchoolHasClasses($iscom);
            $manager->persist($schoolClass);
        }

        for($i=0;$i<5;$i++)
        {
            $schoolClass = new SchoolClass();
            $schoolClass->setClassName('RH '.$i);
            $schoolClass->setClassSize($i);
            $schoolClass->setSchoolHasClasses($pigier);
            $manager->persist($schoolClass);
        }

        $manager->flush();
    }
}
