<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Author;
use App\Entity\Format;
use Faker\Core\Number;
use App\Entity\Editeur;
use App\Entity\Category;
use App\Entity\Language;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,[
                 
                'label'=>'titre de livre',
                'attr'=>[
                'class'=>'form-control'
            ],
         ])

            ->add('year',NumberType::class, [
                
                'label'=>'année de sortie',
                'attr'=>[
                'class'=>'form-control'
            ],
            ])
            ->add('isbn', TextType::class,[
                
                'label'=>'isbn',
                'attr'=>[
                'class'=>'form-control'
            ],
            ])
            ->add('price', NumberType::class,[
                'label'=>'prix',
                'attr'=>[
                'class'=>'form-control'
            ],
            ])
            ->add('pages', NumberType::class,[
                 
                'label'=>'page',
                'attr'=>[
                'class'=>'form-control'
            ],
            ])
            ->add('description', TextareaType::class,[
                'label'=>'description',
                'attr'=>[
                'class'=>'form-control'
            ],
            ])
            ->add('slug', TextType::class,[
                 
                'label'=>'slug',
                'attr'=>[
                'class'=>'form-control'
            ],
            ])
            ->add('cover',TextType::class,[
              
                'label'=>'cover',
                'attr'=>[
                'class'=>'form-control'
            ],
            ])
            //->add('isAvailable', CheckboxType::class,[
               // 'label'=>'isAvailable',
                //'attr'=>[
               // 'class'=>'form-control'
            //],
           // ])
            ->add('category',EntityType::class,[
                'class'=>Category::class,
                 
                'label'=>'categorie de livre',
                'attr'=>[
                'class'=>'form-control'
            ],
            ])
            ->add('authors', EntityType::class,[
                'class'=>Author::class,
               'choice_label'=>'firstname',
                  'multiple'=>true,
                  'label'=> 'Auteur de livre',
                'attr'=>[
                'class'=>'form-control'
            ],
            ])
            ->add('format', EntityType::class,[
                'class'=>Format::class,
                'label'=>'Format',
                'attr'=>[
                'class'=>'form-control'
            ],
            ])
            ->add('editeur', EntityType::class,[
                'class'=>Editeur::class,
                'label'=>'Editeur',
                'attr'=>[
                'class'=>'form-control'
            ],
            ])
            ->add('language', EntityType::class,[
                'class'=>Language::class,
                'label'=>'Language',
                'attr'=>[
                'class'=>'form-control'
            ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
