<?php

namespace App\Controller\Admin;

use App\Entity\Farm;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FarmCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Farm::class;
    }

 
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title','Nom de la Ressource'),
            TextField::new('details','Prix Unitaire'),
            ChoiceField::new('checkornot','Statue')->setChoices(['En Cours' => 0, 'Terminé' => 1]),
            TextField::new('Farmeur','Pseudo du Farmeur'),
            TextField::new('nameuser','Pseudo du demandeur'),
            TextField::new('quantity','	Quantité'),
        ];
    }

}
