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
            ChoiceField::new('checkornot','Statue')->setChoices(['Commande Refuser' => 'Commande Refuser', 'En Cours de Récolte' => 'En Cours de Récolte',"En Attente d'échange" => "En Attente d'échange","Commande Fini" => "Commande Fini"]),
            TextField::new('Farmeur','Pseudo du Farmeur'),
            TextField::new('nameuser','Pseudo du demandeur'),
            TextField::new('quantity','	Quantité'),
        ];
    }

}
