<?php
namespace App\Controller;

use App\Entity\Rayon;
use App\Repository\RayonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FiltreController extends AbstractController
{
    #[Route('/filtre', name: 'filtre')]
    public function filtre(Request $request, RayonRepository $rayonRepository): Response
    {
        // Récupérez la liste des rayons
        $rayons = $rayonRepository->findAll();

        // Récupérez le rayon sélectionné (s'il y en a un)
        $selectedRayonId = $request->query->get('categorie');

        // Utilisez var_dump pour afficher la valeur de $selectedRayonId
        // var_dump($selectedRayonId);

        // Récupérez les produits liés au rayon sélectionné
        $produitsParRayon = [];
        if ($selectedRayonId) {
            $rayon = $rayonRepository->find($selectedRayonId);

            // Utilisez var_dump pour afficher le contenu de $rayon
            // var_dump($rayon);

            if ($rayon) {
                $produitsParRayon[$selectedRayonId] = $rayon->getProduits();
            }
        }

        // Utilisez var_dump pour afficher le contenu de $produitsParRayon
        // var_dump($produitsParRayon);

        return $this->render('filtre.html.twig', [
            'categories' => $rayons,
            'selectedRayonId' => $selectedRayonId,
            'produitsParRayon' => $produitsParRayon,
        ]);
    }
}
