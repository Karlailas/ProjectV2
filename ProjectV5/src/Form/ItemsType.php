<?php

namespace App\Form;

use App\Entity\Items;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ItemsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => 'Item name',
                'attr' => array(
                    'placeholder' => 'Enter your item name here'
                )))
            ->add('photo', FileType::class, array(
                'label' => 'Image',
                'data_class' => null,
                'attr' => array(
                    'placeholder' => 'Upload your image')))
            ->add('condition', ChoiceType::class, array(
                'choices' => array(
                    'Used' => 'Used',
                    'Brand new' => 'Brand new',
                    'Borrowed' => 'Borrowed',
                    'Broken' => 'Broken',
                    'Missing' => 'Missing')))
            ->add('condition_description', TextType::class, array(
                    'label' => 'Description',
                    'attr' => array(
                      'placeholder' => 'Please describe a condition of this item')));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Items::class,
        ]);
    }
}

