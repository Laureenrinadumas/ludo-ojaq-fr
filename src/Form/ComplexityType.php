<?php

namespace App\Form;

use App\Entity\Complexity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComplexityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameLevel', TextType::class, [
              'label' => 'Nom du niveau',
            ])

            ->add('explanation', TextareaType::class, [
                'label' => 'Explication en fonction des niveaux',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Complexity::class,
        ]);
    }
}
