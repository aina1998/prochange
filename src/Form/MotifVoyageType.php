<?php

namespace App\Form;

use App\Entity\MotifVoyage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MotifVoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('MotifVoyageValue', TextType::class, [
                'label' => 'Nouveau motif de voyage :',
                'attr' => [
                    'placeholder' => 'ex : Voyage'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MotifVoyage::class,
        ]);
    }
}
