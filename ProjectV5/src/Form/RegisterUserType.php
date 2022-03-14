<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class,
                array('label' => 'Username',
                    'attr' => array(
                        'placeholder' => 'Enter your username')))
            ->add('email', EmailType::class,
                array('label' => 'Email',
                    'attr' => array(
                        'placeholder' => 'Enter your email address')))
            ->add('password', PasswordType::class,
                array('label' => 'Password',
                    'attr' => array(
                        'placeholder' => 'Enter your new password')))
            ->add('name', TextType::class,
                array('label' => 'Name',
                    'attr' => array(
                        'placeholder' => 'Enter your name')))
            ->add('surname', TextType::class,
                array('label' => 'Surname',
                    'attr' => array(
                        'placeholder' => 'Enter your surname')))
            ->add('Save', SubmitType::class, ['label' => 'Sign Up']);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,]);
    }
}
