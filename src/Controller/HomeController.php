<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProduitRepository;
use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Request;
use App\Form\InscriptionType;

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
    #[Route('/produit/{id}', name: 'product_detail')]
    public function show(Produit $produit): Response
    {
        return $this->render('home/detail.html.twig', [
            'produit' => $produit,
        ]);
    }
    #[Route('/inscription', name: 'inscription')]
    public function inscription(Request $request): Response
    {
        $form = $this->createForm(InscriptionType::class);
        // Gérez la soumission du formulaire si nécessaire
        $form->handleRequest($request);
        // Affichez le formulaire dans votre template
        return $this->render('home/inscription.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

