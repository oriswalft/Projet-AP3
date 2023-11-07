<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Rangee;

class RangeeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Créez les rangées A à L
        $rangees = range('A', 'L');

        foreach ($rangees as $libelle) {
            $rangee = new Rangee();
            $rangee->setLibelle($libelle);
            $manager->persist($rangee);
        }

        $manager->flush();
    }
}
