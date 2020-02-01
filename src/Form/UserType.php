<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('roles', ChoiceType::class, [
                'label' => 'Rôle(s)',
                'multiple' => true,
                'choices' => [
                    'Elève' => 'ROLE_ELEVE',
                    'Professeur' => 'ROLE_PROFESSEUR',
                    'Admin' => 'ROLE_ADMIN',
                    'Super' => 'ROLE_SUPER_ADMIN',
                ],
            ])
            ->add('password', PasswordType::class, [
              'label' => 'Mot de passe'
            ])
            ->add('nom', TextType::class, [
              'label' => 'Nom'
            ])
            ->add('prenom', TextType::class, [
              'label' => 'Prénom'
            ])
            ->add('classrooms', CollectionType::class, [
              'label' => 'Classe(s)'
            ])
            ->add('promotion', CollectionType::class, [
              'label' => 'Promotion'
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
