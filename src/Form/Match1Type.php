<?php

namespace App\Form;

use App\Entity\Match;
use App\Entity\Equipes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Match1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('scoreEquipeDomicile')
            ->add('scoreEquipeExterieur')
            ->add('equipeADomicile', EntityType::class, array(
                        'class'=>'App\Entity\Equipes',
                        'choice_label'=>'nomEquipe',
                        'expanded'=>false,
                        'multiple'=>false))
            ->add('equipeExterieur', EntityType::class, array(
                        'class'=>'App\Entity\Equipes',
                        'choice_label'=>'nomEquipe',
                        'expanded'=>false,
                        'multiple'=>false))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Match::class,
        ]);
    }
}
