<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Offres;
use App\Entity\TypeContrat;
use App\Entity\Contrat;
use Faker\Factory;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        $Contrat = new Contrat();
        $Contrat->setName("CDD");

        $manager->persist($Contrat);

        $TypeContrat = new TypeContrat();
        $TypeContrat->setName("Temps plein");

        $manager->persist($TypeContrat);

        for ($i = 1; $i <= 10; $i++) {
            $offre = new Offres();
            $offre->setTitle("Offre incoyable n°$i")
                ->setDescription($faker->text)
                ->setCodePostal($faker->postcode)
                ->setAdresse($faker->streetAddress)
                ->setVille($faker->city)
                ->setDateDeCreation(new \DateTime())
                ->setDateDeMiseAJour(new \DateTime())
                ->setFinDeLaMission(new \DateTime())
                ->setContrat($Contrat)
                ->setTypeDeContrat($TypeContrat);
            $manager->persist($offre);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
