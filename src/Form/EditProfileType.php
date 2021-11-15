<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class EditProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('discordid', TextType::class, ['label' => 'Discord ID'])
        ->add('pseudo', TextType::class, ['label' => 'Pseudo'])
        ->add('level', IntegerType::class, ['label' => 'Level'])
        ->add('spe', ChoiceType::class, [
            'label' => 'Spé',
            'choices'  => [
                'Tank' => 'Tank',
                'Off Tank' => 'Off Tank',
                'Heal' => 'Heal',
                'PalaHeal (Epée & Bouclier ou Marteau + Bâton de vie)' => 'PalaHeal',
                'Mage' => 'Mage',
                'DPS Distant (Déxtérité)' => 'DPS Distant (Déxtérité)',
            ],
        ])
        ->add('FirstWeapon', ChoiceType::class, [
            'label' => 'Arme principal',
            'choices'  => [
                'Epée et bouclier' => 'Epée et bouclier',
                'Lance' => 'Lance',
                'Arc' => 'Arc',
                'Bâton de feu' => 'Bâton de feu',
                'Rapière' => 'Rapière',
                'Mousquet' => 'Mousquet',
                'Hache Double' => 'Hache Double',
                'Bâton de vie' => 'Bâton de vie',
                'Hachette' => 'Hachette',
                'Marteau D\'armes' => 'Marteau D\'armes',
                'Gantelets de glace' => 'Gantelets de glace',
            ],
        ])
        ->add('SecondWeapon', ChoiceType::class, [
            'label' => 'Arme Secondaire',
            'choices'  => [
                'Epée et bouclier' => 'Epée et bouclier',
                'Lance' => 'Lance',
                'Arc' => 'Arc',
                'Bâton de feu' => 'Bâton de feu',
                'Rapière' => 'Rapière',
                'Mousquet' => 'Mousquet',
                'Hache Double' => 'Hache Double',
                'Bâton de vie' => 'Bâton de vie',
                'Hachette' => 'Hachette',
                'Marteau D\'armes' => 'Marteau D\'armes',
                'Gantelets de glace' => 'Gantelets de glace',
            ],
        ])
        ->add('compagnie', TextType::class, ['label' => 'Compagnie'])
        ->add('GearScore', TextType::class, ['label' => 'GearScore'])

        ->add('FabArmes', ChoiceType::class, [
            'label' => 'Fabrication d\'armes',
            'choices'  => [
                '0' => 0,
                '10' => 10,
                '30' => 30,
                '50' => 50,
                '70' => 70,
                '90' => 90,
                '110' => 110,
                '130' => 130,
                '150' => 150,
                '170' => 170,
                '180' => 180,
                '190' => 190,
                '200' => 200,
            ],
        ])
        ->add('FabArmures', ChoiceType::class, [
            'label' => 'Fabrication d\'armures',
            'choices'  => [
                '0' => 0,
                '10' => 10,
                '30' => 30,
                '50' => 50,
                '70' => 70,
                '90' => 90,
                '110' => 110,
                '130' => 130,
                '150' => 150,
                '170' => 170,
                '180' => 180,
                '190' => 190,
                '200' => 200,
            ],
        ])
        ->add('Ingenierie', ChoiceType::class, [
            'choices'  => [
                '0' => 0,
                '10' => 10,
                '30' => 30,
                '50' => 50,
                '70' => 70,
                '90' => 90,
                '110' => 110,
                '130' => 130,
                '150' => 150,
                '170' => 170,
                '180' => 180,
                '190' => 190,
                '200' => 200,
            ],
        ])
        ->add('Joaillerie', ChoiceType::class, [
            'choices'  => [
                '0' => 0,
                '10' => 10,
                '30' => 30,
                '50' => 50,
                '70' => 70,
                '90' => 90,
                '110' => 110,
                '130' => 130,
                '150' => 150,
                '170' => 170,
                '180' => 180,
                '190' => 190,
                '200' => 200,
            ],
        ])
        ->add('ArtsObscurs', ChoiceType::class, [
            'choices'  => [
                '0' => 0,
                '10' => 10,
                '30' => 30,
                '50' => 50,
                '70' => 70,
                '90' => 90,
                '110' => 110,
                '130' => 130,
                '150' => 150,
                '170' => 170,
                '180' => 180,
                '190' => 190,
                '200' => 200,
            ],
        ])
        ->add('Cuisine', ChoiceType::class, [
            'choices'  => [
                '0' => 0,
                '10' => 10,
                '30' => 30,
                '50' => 50,
                '70' => 70,
                '90' => 90,
                '110' => 110,
                '130' => 130,
                '150' => 150,
                '170' => 170,
                '180' => 180,
                '190' => 190,
                '200' => 200,
            ],
        ])
        ->add('Ameublement', ChoiceType::class, [
            'choices'  => [
                '0' => 0,
                '10' => 10,
                '30' => 30,
                '50' => 50,
                '70' => 70,
                '90' => 90,
                '110' => 110,
                '130' => 130,
                '150' => 150,
                '170' => 170,
                '180' => 180,
                '190' => 190,
                '200' => 200,
            ],
        ])
        ->add('TailleurDePierre', ChoiceType::class, [
            'choices'  => [
                '0' => 0,
                '10' => 10,
                '30' => 30,
                '50' => 50,
                '70' => 70,
                '90' => 90,
                '110' => 110,
                '130' => 130,
                '150' => 150,
                '170' => 170,
                '180' => 180,
                '190' => 190,
                '200' => 200,
            ],
        ])

        ->add('fonderie', ChoiceType::class, [
            'choices'  => [
                'Choisissez un niveau' => '',
                '0' => 0,
                '10' => 10,
                '30' => 30,
                '50' => 50,
                '70' => 70,
                '90' => 90,
                '110' => 110,
                '130' => 130,
                '150' => 150,
                '170' => 170,
                '180' => 180,
                '190' => 190,
                '200' => 200,
            ],
        ])
        ->add('menuiserie', ChoiceType::class, [
            'choices'  => [
                'Choisissez un niveau' => '',
                '0' => 0,
                '10' => 10,
                '30' => 30,
                '50' => 50,
                '70' => 70,
                '90' => 90,
                '110' => 110,
                '130' => 130,
                '150' => 150,
                '170' => 170,
                '180' => 180,
                '190' => 190,
                '200' => 200,
            ],
        ])
        ->add('tannerie', ChoiceType::class, [
            'choices'  => [
                'Choisissez un niveau' => '',
                '0' => 0,
                '10' => 10,
                '30' => 30,
                '50' => 50,
                '70' => 70,
                '90' => 90,
                '110' => 110,
                '130' => 130,
                '150' => 150,
                '170' => 170,
                '180' => 180,
                '190' => 190,
                '200' => 200,
            ],
        ])
        ->add('tissage', ChoiceType::class, [
            'choices'  => [
                'Choisissez un niveau' => '',
                '0' => 0,
                '10' => 10,
                '30' => 30,
                '50' => 50,
                '70' => 70,
                '90' => 90,
                '110' => 110,
                '130' => 130,
                '150' => 150,
                '170' => 170,
                '180' => 180,
                '190' => 190,
                '200' => 200,
            ],
        ])

        ->add('SwordShield', ChoiceType::class, [
            'label' => 'Epée et bouclier',
            'choices'  => [
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10,
                '11' => 11,
                '12' => 12,
                '13' => 13,
                '14' => 14,
                '15' => 15,
                '16' => 16,
                '17' => 17,
                '18' => 18,
                '19' => 19,
                '20' => 20,
            ],
        ])
        ->add('Lance', ChoiceType::class, [
            'label' => 'Lance',
            'choices'  => [
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10,
                '11' => 11,
                '12' => 12,
                '13' => 13,
                '14' => 14,
                '15' => 15,
                '16' => 16,
                '17' => 17,
                '18' => 18,
                '19' => 19,
                '20' => 20,
            ],
        ])
        ->add('Arc', ChoiceType::class, [
            'label' => 'Arc',
            'choices'  => [
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10,
                '11' => 11,
                '12' => 12,
                '13' => 13,
                '14' => 14,
                '15' => 15,
                '16' => 16,
                '17' => 17,
                '18' => 18,
                '19' => 19,
                '20' => 20,
            ],
        ])
        ->add('BatonFeu', ChoiceType::class, [
            'label' => 'Bâton de feu',
            'choices'  => [
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10,
                '11' => 11,
                '12' => 12,
                '13' => 13,
                '14' => 14,
                '15' => 15,
                '16' => 16,
                '17' => 17,
                '18' => 18,
                '19' => 19,
                '20' => 20,
            ],
        ])
        ->add('Rapiere', ChoiceType::class, [
            'label' => 'Rapiere',
            'choices'  => [
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10,
                '11' => 11,
                '12' => 12,
                '13' => 13,
                '14' => 14,
                '15' => 15,
                '16' => 16,
                '17' => 17,
                '18' => 18,
                '19' => 19,
                '20' => 20,
            ],
        ])
        ->add('HacheDouble', ChoiceType::class, [
            'label' => 'Hache Double',
            'choices'  => [
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10,
                '11' => 11,
                '12' => 12,
                '13' => 13,
                '14' => 14,
                '15' => 15,
                '16' => 16,
                '17' => 17,
                '18' => 18,
                '19' => 19,
                '20' => 20,
            ],
        ])
        ->add('Mousquet', ChoiceType::class, [
            'label' => 'Mousquet',
            'choices'  => [
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10,
                '11' => 11,
                '12' => 12,
                '13' => 13,
                '14' => 14,
                '15' => 15,
                '16' => 16,
                '17' => 17,
                '18' => 18,
                '19' => 19,
                '20' => 20,
            ],
        ])
        ->add('BatonVie', ChoiceType::class, [
            'label' => 'Bâton de vie',
            'choices'  => [
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10,
                '11' => 11,
                '12' => 12,
                '13' => 13,
                '14' => 14,
                '15' => 15,
                '16' => 16,
                '17' => 17,
                '18' => 18,
                '19' => 19,
                '20' => 20,
            ],
        ])
        ->add('Hachette', ChoiceType::class, [
            'label' => 'Hachette',
            'choices'  => [
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10,
                '11' => 11,
                '12' => 12,
                '13' => 13,
                '14' => 14,
                '15' => 15,
                '16' => 16,
                '17' => 17,
                '18' => 18,
                '19' => 19,
                '20' => 20,
            ],
        ])
        ->add('MarteauDarmes', ChoiceType::class, [
            'label' => 'Marteau d\'armes',
            'choices'  => [
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10,
                '11' => 11,
                '12' => 12,
                '13' => 13,
                '14' => 14,
                '15' => 15,
                '16' => 16,
                '17' => 17,
                '18' => 18,
                '19' => 19,
                '20' => 20,
            ],
        ])
        ->add('GanteletsGlace', ChoiceType::class, [
            'label' => 'Gantelets de glace',
            'choices'  => [
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10,
                '11' => 11,
                '12' => 12,
                '13' => 13,
                '14' => 14,
                '15' => 15,
                '16' => 16,
                '17' => 17,
                '18' => 18,
                '19' => 19,
                '20' => 20,
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
