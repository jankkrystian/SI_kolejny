<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ORM\Table(name: 'books')]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $author = null;


    /**
     * Genre.
     *
     * @var Genre
     */
    #[ORM\ManyToOne(targetEntity: Genre::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Genre $genre = null;

    /**
     * Publisher.
     *
     * @var Publisher
     */
    #[ORM\ManyToOne(targetEntity: Publisher::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Publisher $publisher = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;

    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;

    }


    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): void
    {
        $this->genre = $genre;

    }

    public function getPublisher(): ?Publisher
    {
        return $this->publisher;
    }

    public function setPublisher(?Publisher $publisher): static
    {
        $this->publisher = $publisher;

        return $this;
    }
}
