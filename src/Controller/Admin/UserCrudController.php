<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            TextField::new('pseudo'),
            ChoiceField::new('roles')->setChoices(['Administrateur' => 'ROLE_ADMIN', 'Farmeur' => 'ROLE_FARM', 'Crafter' => 'ROLE_CRAFT', 'Utilisateur' => 'ROLE_USER'])->allowMultipleChoices(),
            TextField::new('spe'),
            IntegerField::new('GearScore'),

            TextField::new('compagnie')->hideOnIndex(),
            TextField::new('FirstWeapon'),
            TextField::new('SecondWeapon'),
            TextField::new('discordid'),

            IntegerField::new('level'),
            IntegerField::new('FabArmes')->hideOnIndex(),
            IntegerField::new('FabArmures')->hideOnIndex(),
            IntegerField::new('Ingenierie')->hideOnIndex(),
            IntegerField::new('Joaillerie')->hideOnIndex(),
            IntegerField::new('ArtsObscurs')->hideOnIndex(),
            IntegerField::new('Cuisine')->hideOnIndex(),
            IntegerField::new('Ameublement')->hideOnIndex(),
            IntegerField::new('TailleurDePierre')->hideOnIndex(),

            IntegerField::new('SwordShield')->hideOnIndex(),
            IntegerField::new('Lance')->hideOnIndex(),
            IntegerField::new('Arc')->hideOnIndex(),
            IntegerField::new('BatonFeu')->hideOnIndex(),
            IntegerField::new('Rapiere')->hideOnIndex(),
            IntegerField::new('HacheDouble')->hideOnIndex(),
            IntegerField::new('Mousquet')->hideOnIndex(),
            IntegerField::new('BatonVie')->hideOnIndex(),
            IntegerField::new('Hachette')->hideOnIndex(),
            IntegerField::new('MarteauDarmes')->hideOnIndex(),
            IntegerField::new('GanteletsGlace')->hideOnIndex(),
            IntegerField::new('BatonVie')->hideOnIndex(),
            IntegerField::new('BatonVie')->hideOnIndex(),
            IntegerField::new('StatFOR')->hideOnIndex(),
            IntegerField::new('StatDEX')->hideOnIndex(),
            IntegerField::new('StatINT')->hideOnIndex(),
            IntegerField::new('StatCONCEN')->hideOnIndex(),
        ];
    }
    
}
