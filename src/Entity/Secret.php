<?php

namespace App\Entity;

use App\Repository\SecretRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SecretRepository::class)]
class Secret
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 1000)]
    private ?string $secretText = null;

    #[ORM\Column(length: 255)]
    /**
     * @Serializer\Expose)
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("expireAfter")
     */
    private ?\DateTime $expiresAt = null;

    #[ORM\Column(length: 255)]
    /**
     * @Serializer\Expose)
     * @Serializer\Type("int")
     * @Serializer\SerializedName("expireAfterViews")
     */
    private ?int $remainingViews = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(length: 255)]
    /**
     * @Serializer\Expose)
     * @Serializer\Type("int")
     * @Serializer\SerializedName("expireView")
     */
    private ?string $expireView;

    #[ORM\Column(length: 255)]
    /**
     * @Serializer\Expose)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("hash")
     */
    private ?string $hash = null;

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

    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }

    public function setExpiresAt(\DateTime $expiresAt): static
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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getExpireView(): ?int
    {
        return $this->expireView;
    }

    public function setExpireView(int $expireView): static
    {
        $this->expireView = $expireView;

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): static
    {
        $this->hash = $hash;

        return $this;
    }
}
