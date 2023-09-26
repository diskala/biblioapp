<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('year')
            ->add('isbn')
            ->add('price')
            ->add('pages')
            ->add('description')
            ->add('slug')
            ->add('cover')
            ->add('isAvailable')
            ->add('category')
            ->add('authors')
            ->add('format')
            ->add('editeur')
            ->add('language')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
