<?php

namespace App\Form;

use App\Entity\Game;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('rule')
            ->add('gameTime')
            ->add('age')
            ->add('numberPlayer')
            ->add('poster')
            ->add('creationDate')
            ->add('category')
            ->add('user')
            ->add('complexity')
            ->add('frequency')
            ->add('gamePlay')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
