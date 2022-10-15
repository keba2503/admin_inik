<?php

namespace App\Controller\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

use App\Entity\Images;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Images::class;
    }

    
    public function configureFields(string $pageName): iterable
    {

        
        return [
            FormField::addPanel('vehiculos'),
            AssociationField::new('vehiculos')
                ->setRequired(true)
                ->setHelp('vehiculos'),
            TextField::new('nombre'),
            TextField::new('url'),
        ];

    }
    
}
