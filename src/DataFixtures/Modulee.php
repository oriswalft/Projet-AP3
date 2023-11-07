<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Modulee;

class ModuleeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Créez les modules M1 à M6
        for ($i = 1; $i <= 6; $i++) {
            $modulee = new Modulee();
            $modulee->setIlbelle('M' . $i);
            $manager->persist($modulee);
        }

        $manager->flush();
    }
}
