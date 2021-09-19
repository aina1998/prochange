<?php

namespace App\Form;

use App\Entity\Clients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', TextType::class, [
                'label' => "Nom complet du client :",
                'attr' => [
                    'placeholder' => "Nom complet du client"
                ],
                'required' => true
            ])
            ->add('adresse', TextType::class, [
                'label' => "Adresse du client :",
                'attr' => [
                    'placeholder' => "Adresse du client"
                ],
                'required' => true
            ])
            ->add('DocumentValue', TextType::class, [
                'label' => "Numero du document :",
                'attr' => [
                    'placeholder' => "Numero du document"
                ],
                'required' => true
            ])
            ->add('Documents')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Clients::class,
        ]);
    }
}
