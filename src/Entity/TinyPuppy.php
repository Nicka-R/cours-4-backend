<?php

namespace App\Entity;

use App\Repository\TinyPuppyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TinyPuppyRepository::class)]
class TinyPuppy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
