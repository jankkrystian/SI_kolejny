<?php
/**
 * Genre entity.
 */

namespace App\Repository;

use App\Entity\Genre;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class Genre.
 *
 * @psalm-suppress MissingConstructor
 */
#[ORM\Entity(repositoryClass: GenreRepository::class)]
#[ORM\Table(name: 'genres')]
#[ORM\UniqueConstraint(name: 'uq_categories_title', columns: ['title'])]
#[UniqueEntity(fields: ['title'])]
class GenreRepository extends ServiceEntityRepository
{
    /**
     * Primary key.
     *
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;


    /**
     * Title.
     *
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 255)]
    private ?string $title;

    /**
     * Getter for Id.
     *
     * @return int|null Id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for title.
     *
     * @return string|null Title
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Setter for title.
     *
     * @param string|null $title Title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }
}
