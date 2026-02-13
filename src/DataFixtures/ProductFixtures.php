<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use App\Entity\Product;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 100; $i++) {
            $product = new Product();

            $product->setTitre($faker->sentence(3))
                    ->setDescription($faker->paragraph(4))
                    ->setPrix($faker->randomFloat(2, 10, 1000))
                    ->setSlug($faker->slug())
                    ->setImageName('https://picsum.photos/seed/'.$i.'/680/480')
                    ->setStatus($faker->randomElement(['available', 'unavailable','preorder']))
                    ->setStock($faker->numberBetween(0, 100))
                    ->setAcceptConditions($faker->boolean())
                    ->setCreateAt(new DateTimeImmutable());

            $manager->persist($product);
        }

        $manager->flush();
    }
}



class BrandFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $brand = new Brand();

            $brand->setBrandName($faker->sentence(3))
                    ->setDescription($faker->paragraph(4));

            $manager->persist($brand);
        }

        $manager->flush();
    }
}