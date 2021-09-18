<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo', TextType::class, [
                'label' => "Nouveau nom d'utilisateur :",
                'attr' => [
                    'placeholder' => "Nom d'utilisateur"
                ],
                'required' => true
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre adresse email :',
                'attr' => [
                    'placeholder' => "Adresse email"
                ]
            ])
            ->add('hash', PasswordType::class, [
                'label' => 'Nouveau mot de passe :',
                'attr' => [
                    'placeholder' => "Nouveau mot de passe"
                ],
                'required' => true
            ])
            ->add('passwordConfirm', PasswordType::class, [
                'label' => "Confirmer le mot de passe :",
                'attr' => [
                    'placeholder' => "Confirmer le mot de passe"
                ],
                'required' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
