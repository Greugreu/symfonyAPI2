<?php

namespace App\DataFixtures;

use App\Entity\ClassStudent;
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


        $BCI = new SchoolClass();
        $BCI->setClassName('BCI');
        $BCI->setClassSize(30);
        $BCI->setSchoolHasClasses($nfactory);
        $manager->persist($BCI);


        $comm = new SchoolClass();
        $comm->setClassName('COMM');
        $comm->setClassSize(30);
        $comm->setSchoolHasClasses($iscom);
        $manager->persist($comm);


        $RH = new SchoolClass();
        $RH->setClassName('RH');
        $RH->setClassSize(30);
        $RH->setSchoolHasClasses($pigier);
        $manager->persist($RH);


        for ($i = 0; $i < 25; $i++) {
            $classStudentBci = new ClassStudent();
            $classStudentBci->setName('NameBCI ' . $i);
            $classStudentBci->setAge(10 + $i);
            $classStudentBci->setStudentClass($BCI);
            $manager->persist($classStudentBci);
        }

        for ($i = 0; $i < 25; $i++) {
            $classStudentComm = new ClassStudent();
            $classStudentComm->setName('NameComm ' . $i);
            $classStudentComm->setAge(11 + $i);
            $classStudentComm->setStudentClass($comm);
            $manager->persist($classStudentComm);
        }

        for ($i = 0; $i < 25; $i++) {
            $classStudentRh = new ClassStudent();
            $classStudentRh->setName('NameRh ' . $i);
            $classStudentRh->setAge(12 + $i);
            $classStudentRh->setStudentClass($RH);
            $manager->persist($classStudentRh);
        }

        $manager->flush();
    }
}
