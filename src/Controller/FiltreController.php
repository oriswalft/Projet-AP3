<?php
namespace App\Controller;

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
        $rayons = $rayonRepository->findAll();

        $selectedRayonId = $request->query->get('categorie');

        if ($selectedRayonId) {
            $rayon = $rayonRepository->find($selectedRayonId);
            if ($rayon) {
                $produitsParRayon = [$selectedRayonId => $rayon->getProduits()];
            } else {
                $produitsParRayon = [];
            }
        } else {
            $produitsParRayon = [];
        }

        return $this->render('filtre.html.twig', [
            'categories' => $rayons,
            'selectedRayonId' => $selectedRayonId,
            'produitsParRayon' => $produitsParRayon,
        ]);
    }
}
