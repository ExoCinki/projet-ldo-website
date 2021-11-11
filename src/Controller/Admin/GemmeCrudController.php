<?php

namespace App\Controller\Admin;

use App\Entity\Gemme;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GemmeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gemme::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextareaField::new('details'),
            TextField::new('tier'),
            TextField::new('picture'),
            TextField::new('stuff'),
        ];
    }
    
}
