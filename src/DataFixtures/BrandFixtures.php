<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BrandFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $brand = new Brand();

            $brand->setBrandName($faker->sentence(3))
                    ->setDescription($faker->paragraph(4));

            $manager->persist($brand);
        }

        $manager->flush();
    }

    public function getDependencies(): array 
    {
        return [
            BrandFixtures::class,
        ];
    }
}