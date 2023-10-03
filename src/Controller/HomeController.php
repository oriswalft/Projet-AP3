<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProduitRepository;
use App\Repository\RayonRepository;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{

    #[Route('/', name: 'app_accueil')]
    public function accueil(ProduitRepository $produitReposotory): Response
    {
        $produits = $produitReposotory->findall();
        return $this->render('home/accueil.html.twig', [
            'produits'  => $produits,
        ]);
        
    }
}
