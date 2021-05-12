<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Complexity;
use App\Entity\Game;
use App\Entity\GamePlay;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
                'label' => '+Age',
            ])
            ->add('poster', TextType::class, [
                'label' => 'Image du jeu (url)',
            ])
            ->add('creationDate', DateType::class, [
                'label' => 'Année de création ',
                'widget' => 'single_text',
                'format'=> 'yyyy',
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
            ->add('category', null, [
                'label' => 'Catégorie',
                'choice_label' => 'name',

            ])
            ->add('complexity', EntityType::class, [
                'label' => 'Complexité du jeu',
                'class' => Complexity::class,
                'choice_label' => 'nameLevel',
                'multiple' => false,
            ])
            ->add('gamePlays', EntityType::class, [
                'label' => 'Mécanique du jeu',
                'class' => GamePlay::class,
                'choice_label' => 'namePlay',
                'multiple' => true,
                'expanded' => true,
                'by_reference'=>false,
            ]);

        }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
