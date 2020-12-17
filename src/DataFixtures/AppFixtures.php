<?php
namespace App\DataFixtures;

use App\Entity\Promotion;
use App\Entity\Classroom;
use App\Entity\User;
use App\Entity\Project;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $promotion = new Promotion();
        $promotion->setNom("Noether");
        $debut = new \DateTime('2018');
        $fin = new \DateTime('2023');
        $promotion->setPeriod($fin - $debut); // A améliorer.

        $bilel = new User();
        $bilel->setNom('BEN BOUBAKER');
        $bilel->setPrenom('Bilel');
        $bilel->setEmail('bbb@bbb.com');
        $bilel->setRoles(['ROLE_ADMIN']);

        die();

        $manager->flush();
    }
}
