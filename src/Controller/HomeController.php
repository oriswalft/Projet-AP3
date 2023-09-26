<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    #[Route('/accueil', name: 'app_accueil')]
    public function accueil(): Response
    {
        return $this->render('home/accueil.html.twig', []);
    }

    #[Route('/filtrage', name: 'app_filtrage')]
    public function filtrage(): Response
    {
        return $this->render('filtre.html.twig', []);
    }
}
