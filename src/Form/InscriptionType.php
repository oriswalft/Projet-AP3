<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('roles')
            ->add('password')
            ->add('email')
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            ->add('dateNaissance')
            ->add('nombreEnfant')
            ->add('ageEnfants')
            ->add('sportPratiquee')
            ->add('dateDernierAchat')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
