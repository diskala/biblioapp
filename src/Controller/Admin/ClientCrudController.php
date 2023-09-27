<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use Faker\Core\Number;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Entrer votre Nom et votre Prenom:')
            ->setIcon('fas fa-user')
            ->setHelp('Cette section contient les informations de client'),
            TextField::new('firstname','Votre Nom et votre Prenom'),

            FormField::addPanel('Année de naissance:')
            ->setIcon('fas fa-cake-candles')
            ->setHelp('Cette section contient les informations de client'),
            NumberField::new('year','Votre Année de naissance'),

            FormField::addPanel('Entrer votre Email:')
            ->setIcon('fas fa-envelope')
            ->setHelp('Cette section contient les informations de client'),
            TextField::new('email','Votre Email'),

            FormField::addPanel('Entrer votre ville:')
            ->setIcon('fas fa-city')
            ->setHelp('Cette section contient les informations de client'),
            TextField::new('city','Votre ville'),

            FormField::addPanel('Entrer votre code postal:')
            ->setIcon('fas fa-mailbox')
            ->setHelp('Cette section contient les informations de client'),
            NumberField::new('postal_code','Votre code postal'),

        ];
    }
    
}
