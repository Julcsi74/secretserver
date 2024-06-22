<?php

namespace App\Entity;

use App\Repository\FormRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormRepository::class)]
class Form
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 1000)]
    private ?string $secretText = null;

    #[ORM\Column]
    private ?int $expiresAt = null;

    #[ORM\Column]
    private ?int $remainingViews = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSecretText(): ?string
    {
        return $this->secretText;
    }

    public function setSecretText(string $secretText): static
    {
        $this->secretText = $secretText;

        return $this;
    }

    public function getExpiresAt(): ?int
    {
        return $this->expiresAt;
    }

    public function setExpiresAt(int $expiresAt): static
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    public function getRemainingViews(): ?int
    {
        return $this->remainingViews;
    }

    public function setRemainingViews(int $remainingViews): static
    {
        $this->remainingViews = $remainingViews;

        return $this;
    }
}
