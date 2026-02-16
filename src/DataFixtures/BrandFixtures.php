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
        $brandsTab=[
            'Mapple',
            'Samsong',
            'Suny',
            'BG',
            'Bell',
            'PV',
            'Lenouvo',
            'Casus',
            'Cancer',
            'Macrosoft'
        ];
        
        foreach ($brandsTab as $index => $brandName) {
            $brand = new Brand();

            $brand->setBrandName($brandName)
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