<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Etagere;

class EtagereFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Créez des étagères (au minimum 1, au maximum 8) pour chaque section
        $sections = $manager->getRepository(Section::class)->findAll();

        foreach ($sections as $section) {
            $numberOfEtageres = random_int(1, 8);

            for ($i = 0; $i < $numberOfEtageres; $i++) {
                $etagere = new Etagere();
                $etagere->setLibelle('Etagere ' . ($i + 1));
                $etagere->setSection($section);
                $manager->persist($etagere);
            }
        }

        $manager->flush();
    }
}
