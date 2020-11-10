<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Offres;
use Faker\Factory;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

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
                ->setTypeDeContrat($faker->randomElement($array = array ('Temps plein','Temps partiel')))
                ->setContrat($faker->randomElement($array = array ('CDD','CDI','FREE')));
            $manager->persist($offre);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
