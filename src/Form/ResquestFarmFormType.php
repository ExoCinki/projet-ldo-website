<?php

namespace App\Form;

use App\Entity\CraftRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ResquestFarmFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('title', TextType::class,['label' => 'Objet à Craft'])
        ->add('details', TextType::class,['label' => 'Recette de Craft'])
        ->add('quantity', TextType::class,['label' => 'Quantité'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CraftRequest::class,
        ]);
    }
}
