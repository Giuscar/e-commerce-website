<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Your firstname',
                'attr' => [
                    'placeholder' => 'Please insert your firstname'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Your lastname',
                'attr' => [
                    'placeholder' => 'Please insert your lastname'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Your email',
                'attr' => [
                    'placeholder' => 'Please insert your email'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password is not the same',
                'label' => 'Your password',
                'required' => true,
                'first_options' => ['label' => 'Insert your password'],
                'second_options' => ['label' => 'Confirm your password']
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
