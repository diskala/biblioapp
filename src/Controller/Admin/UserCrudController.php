<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            //FormField::addTab('Information du compte'),
            IdField::new('id')->hideOnForm(),
            FormField::addPanel('Information du compte')
                      ->setIcon('fas-fa-user')
                      ->setHelp('Cette section contient les informations de l\'utilisateur'),
           TextField::new('email','Adresse email'),
                     
            //TextEditorField::new('description'),
        ];
    }
    
}
