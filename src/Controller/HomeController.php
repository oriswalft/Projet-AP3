<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Rayon;
use App\Repository\RayonRepository;
use App\Repository\ProduitRepository;
use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Request;


class HomeController extends AbstractController
{

    #[Route('/', name: 'app_accueil')]
    public function accueil(Request $request, RayonRepository $rayonRepository, ProduitRepository $produitRepository): Response
    {
        $produits = $produitRepository->findAll();
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
        return $this->render('home/accueil.html.twig', [
            'produits'  => $produits,
            'categories' => $rayons,
            'selectedRayonId' => $selectedRayonId,
            'produitsParRayon' => $produitsParRayon,
        ]);
        
    }
    #[Route('/produit/{id}', name: 'product_detail')]
    public function show(Produit $produit): Response
    {
        return $this->render('home/detail.html.twig', [
            'produit' => $produit,
        ]);
    }
}

