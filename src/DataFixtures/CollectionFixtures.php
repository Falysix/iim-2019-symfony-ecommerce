<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Collection;
use Symfony\Component\Serializer\Mapping\Factory\ClassResolverTrait;
use Faker\Factory;
use Cocur\Slugify\Slugify;

class CollectionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $slugify = new Slugify();

        for ($i=0; $i<5;$i++){
            $faker = Factory::create('fr_FR');
            $collection = new Collection();
            $collection->setName($faker->word);
            $collection->setSlug($slugify->slugify($faker->word));
            $collection->setPictureUrl('https://via.placeholder.com/1970x570');
            $collection->setDateAdd(new \DateTime());

            $manager->persist($collection);
        }
        $manager->flush();
    }
}
