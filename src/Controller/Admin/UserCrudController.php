<?php

namespace App\Controller\Admin;

use App\Entity\User;
use phpDocumentor\Reflection\Types\Integer;
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
            ChoiceField::new('roles')->setChoices(['Administrateur' => 'ROLE_ADMIN', 'Professionnel' => 'ROLE_PRO', 'Utilisateur' => 'ROLE_USER'])->allowMultipleChoices(),
            TextField::new('spe'),
            IntegerField::new('GearScore'),

            TextField::new('compagnie'),
            TextField::new('FirstWeapon'),
            TextField::new('SecondWeapon'),
            TextField::new('discordid'),

            IntegerField::new('level'),
            IntegerField::new('FabArmes'),
            IntegerField::new('FabArmures'),
            IntegerField::new('Ingenierie'),
            IntegerField::new('Joaillerie'),
            IntegerField::new('ArtsObscurs'),
            IntegerField::new('Cuisine'),
            IntegerField::new('Ameublement'),
            IntegerField::new('TailleurDePierre'),

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
