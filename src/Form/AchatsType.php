<?php

namespace App\Form;

use App\Entity\Achats;
use App\Entity\Clients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AchatsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NumeroFacture', TextType::class, [
                'label' => "Numero de facture :",
                'attr' => [
                    'placeholder' => "Numero facture"
                ]
            ])
            ->add('NomClient', TextType::class, [
                'label' => "Nom du client :",
                'attr' => [
                    'placeholder' => "Nom du client"
                ],
            ])
            ->add('NumeroDocument', TextType::class, [
                'label' => "Numero du document",
                'attr' => [
                    'placeholder' => "Numero du document"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Achats::class,
        ]);
    }
}
