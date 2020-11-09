<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Offres;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $offre = new Offres();
            $offre->setTitle("$i ème Offre incoyable")
                ->setDescription("Description du pif provisoire")
                ->setCodePostal("$i$i - $i$i$i")
                ->setAdresse("$i rue de la ménagère boiteuse")
                ->setVille("$i-City")
                ->setDateDeCreation(new \DateTime())
                ->setDateDeMiseAJour(new \DateTime())
                ->setFinDeLaMission(new \DateTime())
                ->setTypeDeContrat("Work in progress")
                ->setContrat("Work in progress");
            $manager->persist($offre);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
