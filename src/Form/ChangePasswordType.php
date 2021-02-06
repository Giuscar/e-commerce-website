<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'disabled' => true,
                'label' => 'My email'
            ])
            ->add('firstname', TextType::class, [
                'disabled' => true,
                'label' => 'My firstname'
            ])
            ->add('lastname', TextType::class, [
                'disabled' => true,
                'label' => 'My lastname'
            ])
            ->add('old_password', PasswordType::class, [
                'mapped' => false,
                'label' => 'My password',
                'attr' => [
                    'placeholder' => 'Your actual password'
                ]
            ])
            ->add('new_password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password is not the same',
                'label' => 'Your password',
                'mapped' => false, //field to add in case it is not mapped in the User class.
                'required' => true,
                'first_options' => ['label' => 'Insert your new password',
                    'attr' => [
                        'placeholder' => 'Please insert your new password'
                    ]
                ],
                'second_options' => ['label' => 'Confirm your new password',
                    'attr' => [
                        'placeholder' => 'Please confirm your new password'
                    ]
                ]
            ])
            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
