<?php
namespace App\Controller;

use App\Entity\Rayon;
use App\Repository\RayonRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FiltreController extends AbstractController
{
    #[Route('/filtre', name: 'filtre')]
    public function filtre(Request $request, RayonRepository $rayonRepository, ProduitRepository $produitRepository): Response
    {
        // Récupérez la liste des rayons
        $rayons = $rayonRepository->findAll();

        // Récupérez le rayon sélectionné (s'il y en a un)
        $selectedRayonId = $request->query->get('categorie');

        // Récupérez les produits liés au rayon sélectionné
        $produitsParRayon = [];
        if ($selectedRayonId) {
            // Utilisez le ProduitRepository pour récupérer les produits liés à la catégorie
            $produitsParRayon[$selectedRayonId] = $produitRepository->findByCategorie($selectedRayonId);
        }

        return $this->render('filtre.html.twig', [
            'categories' => $rayons,
            'selectedRayonId' => $selectedRayonId,
            'produitsParRayon' => $produitsParRayon,
        ]);
    }
}
