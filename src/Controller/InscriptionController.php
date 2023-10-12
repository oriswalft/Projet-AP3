<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionType;
use Doctrine\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Doctrine\ORM\EntityManagerInterface;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'inscription')]
    public function inscription (Request $requestUser,UserPasswordHasherInterface $passwordEncoder, EntityManagerInterface $doctrine): Response
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(InscriptionType::class, $utilisateur);
    
        $form->handleRequest($requestUser);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Hacher le mot de passe
            $hashedPassword = $passwordEncoder->hashPassword($utilisateur, $utilisateur->getPassword());
            $utilisateur->setPassword($hashedPassword);

            $utilisateurTrouve = $doctrine->getRepository(Utilisateur::class)->findOneBy(['email' => $utilisateur->getEmail()]);

            if ($utilisateurTrouve) {
                $this->addFlash('error', 'Cet email est déjà utilisé');
                return $this->redirectToRoute('inscription');
            }

            $doctrine->persist($utilisateur);
            $doctrine->flush();
    
            // Redirigez vers une page de confirmation ou autre
            return $this->redirectToRoute('app_accueil');
        }
    
        return $this->render('inscription/inscription.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
