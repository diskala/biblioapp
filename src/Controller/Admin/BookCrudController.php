<?php

namespace App\Controller\Admin;

use App\Entity\Book;
use Faker\Core\Number;
use PhpParser\Node\Expr\Cast\Bool_;
use App\Controller\Admin\AuthorCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BookCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Book::class;
    }
    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions)
        ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Titre de livre')
            ->setIcon('fas fa-book')
            ->setHelp('Cette section contient les informations de l\'utilisateur'),
            TextField::new('title','Titre de livre'),
            SlugField::new('slug')
            ->setTargetFieldName('title')
            ->hideOnIndex(),
           

            FormField::addPanel('Année de publication livre')
                      ->setIcon('fas fa-calendar')
                      ->setHelp('Quelle est l\'année de publication du livre?'),
           NumberField::new('year','Année de publication'),

           FormField::addPanel('ISBN')
                      ->setIcon('fas fa-barcode')
                      ->setHelp('Quelle est l\'ISBN : le numéro internationale de normalisation du livre?'),
           TextField::new('isbn','ISBN du livre'),

           //TODO AVOIR LORS DES QUERY BUILDER
           //FormField::addPanel('Auteur du livre')
           //           ->setIcon('fas fa-pen-nib')
           //           ->setHelp('Qui est auteur du livre?'),
          // AssociationField::new('authors','Auteur du livre')
          //                 ->autocomplete()
          //                 ->setCrudController(AuthorCrudController::class),

             FormField::addPanel('Category du livre')
                        ->setIcon('fas fa-list')
                         ->setHelp('Quelle est la categorie du livre?'),
           AssociationField::new('category','Category du livre')
                            ->autocomplete()
                            ->setCrudController(CategoryCrudController::class),

            FormField::addPanel('Format du livre')
                            ->setIcon('fas fa-book-open')
                             ->setHelp('Quelle est le format du livre?'),
            AssociationField::new('format','Format du livre')
                                ->autocomplete()
                                ->setCrudController(FormatCrudController::class),

            FormField::addPanel('Editeur du livre')
                                ->setIcon('fas fa-building')
                                 ->setHelp('Quelle est ll\'editeur du livre?'),
             AssociationField::new('editeur','Editeur du livre')
                                    ->autocomplete()
                                    ->setCrudController(EditeurCrudController::class),

                                    FormField::addPanel('Langue')
                                    ->setIcon('fas fa-language')
                                     ->setHelp('Quelle est la langue du livre?'),
                       AssociationField::new('language','langue')
                                        ->autocomplete()
                                        ->setCrudController(LanguageCrudController::class),

           FormField::addPanel('Valeur du livre')
                      ->setIcon('fas fa-euro-sign')
                      ->setHelp('Quelle est le prix du livre?'),
           MoneyField::new('price','La valeur du livre en euros')
                    ->setCurrency('EUR'),

           FormField::addPanel('Nombre de pages')
           ->setIcon('fas fa-file')
           ->setHelp('Combien de pages contient le livre?'),
           NumberField::new('pages','numéro de la page'),

          FormField::addPanel('Description du livre')
           ->setIcon('fas fa-alt')
           ->setHelp('Description?'),
          TextEditorField::new('description','Description du livre'),

          FormField::addPanel('Slug')
           ->setIcon('fas fa-tag')
           ->setHelp('Slug du livre?'),
          SlugField::new('slug','Slug du livre')
          ->setTargetFieldName('title'),

          

          FormField::addPanel('Disponibilité du livre')
           ->setIcon('fas fa-check')
           ->setHelp('Statut du livre?'),
          BooleanField::new('isAvailable','Statut du livre'),

          FormField::addPanel('Couverture du livre')
           ->setIcon('fas fa-image')
           ->setHelp('Ajoouter une image de couverture du livre?'),
          ImageField::new('cover','Couverture du livre')
          ->setBasePath('uploads/images/')
          ->setUploadDir('public/uploads/images/')
          ->setUploadedFileNamePattern('[slug]-[timtstamp].[extension]'),
        ];
    }
    
}
