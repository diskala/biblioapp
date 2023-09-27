<?php

namespace App\Entity;

use App\Entity\Book;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Mime\Message;
use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity(repositoryClass: AuthorRepository::class)]
class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\length(
        min: 2,
        max: 50,
        minMessage:'Minimum{{limit}} caractères attendus',
        maxMessage:'Maximum{{limit}} caractères attendus',
    )]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    
    private ?string $lastname = null;

    #[ORM\Column(nullable: true)]
    
    #[Assert\length(
        min: 4,
        max: 4,
        minMessage:'saisissez une année avec {{limit}} caractères attendus',
         
    )]

    #[Assert\Positive(
         message: 'saisissez une année valide',
    )]
    private ?int $year = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    

    private ?string $bio = null;

    #[Assert\Url(
    
        //Message: 'saisissez un URL valide avec https://',
         
    )]

     
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $link = null;

    #[ORM\ManyToMany(targetEntity: Book::class, inversedBy: 'authors')]
    private Collection $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): static
    {
        $this->bio = $bio;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): static
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return Collection<int, Book>
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): static
    {
        if (!$this->books->contains($book)) {
            $this->books->add($book);
        }

        return $this;
    }

    public function removeBook(Book $book): static
    {
        $this->books->removeElement($book);

        return $this;
    }

     //convert to string
 public function __toString(): string
    {
     return $this->firstname.' '.$this->lastname;
    }
  
}
