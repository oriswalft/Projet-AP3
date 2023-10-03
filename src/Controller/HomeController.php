<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProduitRepository;
use App\Repository\RayonRepository;

class HomeController extends AbstractController
{

    #[Route('/', name: 'app_accueil')]
    public function accueil(): Response
    {
        return $this->render('home/accueil.html.twig', []);
    }

    #[Route('/filtrage', name: 'app_filtrage')]
    public function filtrage(RayonRepository $rayonRepository, ProduitRepository $produitReposotory): Response
    {
        $categories = $rayonRepository->findall();
        $produits = $produitReposotory->findall();
        return $this->render('filtre.html.twig', [
            'categories' => $categories,
            'produits'  => $produits,

        ]);
        
    }
}
