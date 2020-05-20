<?php

namespace App\Form;

use App\Entity\Game;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
                ])
            ->add('rule', TextareaType::class, [
                'label' => 'Règle du jeu',
            ])
            ->add('age', IntegerType::class, [
                'label' => 'Age',
            ])
            ->add('poster', TextType::class, [
                'label' => 'Image du jeu',
            ])
            ->add('creationDate', DateType::class, [
                'label' => 'Date de création',
            ])
            ->add('gameTimeMin', TimeType::class, [
                'label' => 'Temps d\'une partie minimum',
            ])
            ->add('gameTimeMax', TimeType::class, [
                'label' => 'Temps d\'une partie maximum',
            ])
            ->add('numberPlayerMin', IntegerType::class, [
                'label' => 'Nombre de joueur(s) minimum',
            ])
            ->add('numberPlayerMax', IntegerType::class, [
                'label' => 'Nombre de joueur(s) maximum',
            ])
            ->add('category', TextType::class, [
                'label' => 'Catégorie',
            ])
            ->add('complexity', TextType::class, [
                'label' => 'Complexité du jeu',
            ])
            ->add('gamePlay', TextareaType::class, [
                'label' => 'Mécanique du jeu',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
