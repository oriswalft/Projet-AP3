<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Section;

class SectionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Créez les sections numérotées de 1 à 12
        for ($i = 1; $i <= 12; $i++) {
            $section = new Section();
            $section->setLibelle((string)$i);
            $manager->persist($section);
        }

        $manager->flush();
    }
}
