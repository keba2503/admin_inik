<?php

namespace App\Controller\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

use App\Entity\Vehiculos;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VehiculosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vehiculos::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
         
            TextField::new('nombre'),
            TextField::new('precio'),
            BooleanField::new('disponibilidad')->renderAsSwitch(false)
        ];
    }
}
