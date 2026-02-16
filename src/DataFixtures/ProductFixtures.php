<?php

namespace App\DataFixtures;

use App\DataFixtures\BrandFixtures;
use App\Entity\Brand;
use App\Entity\Product;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProductFixtures extends Fixture implements DependentFixtureInterface
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
                    ->setCreateAt(new DateTimeImmutable())
                    ->setMarque($this->getReference('brand_'.$faker->randomDigit(0.9), Brand::class));

            $manager->persist($product);
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