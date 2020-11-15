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

        $ContratCdd = new Contrat();
        $ContratCdd->setName("CDD");

        $ContratCdi = new Contrat();
        $ContratCdi->setName("CDI");

        $ContratFree = new Contrat();
        $ContratFree->setName("FREELANCE");



        $manager->persist($ContratCdd);
        $manager->persist($ContratCdi);
        $manager->persist($ContratFree);

        $TypeContratTplein = new TypeContrat();
        $TypeContratTplein->setName("Temps plein");

        $TypeContratTpartiel = new TypeContrat();
        $TypeContratTpartiel->setName("Temps partiel");

        $manager->persist($TypeContratTplein);
        $manager->persist($TypeContratTpartiel);

        for ($i = 1; $i <= 15; $i++) {
            $offre = new Offres();
            $offre->setTitle("Offre incoyable n°$i")
                ->setDescription($faker->text)
                ->setCodePostal($faker->postcode)
                ->setAdresse($faker->streetAddress)
                ->setVille($faker->city)
                ->setDateDeCreation(new \DateTime())
                ->setDateDeMiseAJour(new \DateTime())
                ->setContrat($faker->randomElement($array = array ($ContratCdd,$ContratCdi,$ContratFree)))
                ->setTypeContrat($faker->randomElement($array = array ($TypeContratTplein,$TypeContratTpartiel)))
                ->setFinDeLaMission($faker->dateTimeBetween($startDate = 'now', $endDate = '3 years'));
       




            $manager->persist($offre);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
