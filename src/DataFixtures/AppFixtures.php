<?php

namespace App\DataFixtures;
use Faker;
use Faker\Factory;
use App\Entity\Book;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void

    
    {
        $faker= Factory::create($fakerLOCALE='fr_FR');
        $objectCategory=[];
        $categorys=['Roman', 'Bande dessiné', 'Poésie', 'Fantastique', 'Documentaire', 'Policier', 'Aventure', 'Biographie'];
        for($i=0;$i<count($categorys); $i++)
        {
        $category= new Category;
        $category->setName($categorys[$i])
                 ->setDescreption($faker->sentence(1))
                 ->setImage($faker->image())
                 ; 
         array_push($objectCategory,$category);
        $manager->persist($category);
        }
        for($i=0;$i<500;$i++)
        {
        $book = new book();
        $book->setTitle($faker->sentence(1))
             ->setDescription($faker->sentence(7))
             ->setSlug('slug-temporaire')
             ->setPages(203)
             ->setYear($faker->numberBetween(1950, 2023))
             ->setIsAvailable($faker->boolean())
             ->setCategory($objectCategory[rand(0,7)]);
            
        $manager->persist($book);

        $manager->flush();
        }
    }
}
