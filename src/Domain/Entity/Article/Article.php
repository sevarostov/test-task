<?php

namespace App\Domain\Entity\Article;

use App\Infrastructure\Persistence\Doctrine\Repository\Article\ArticleRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[ORM\Table(name: 'article')]
class Article {
	#[ORM\Id, ORM\Column(type: 'integer', options: ['unsigned' => true]), ORM\GeneratedValue]
	private ?int $id;

	#[ORM\Column(type: 'string', length: 255)]
	private string $title;

	#[ORM\Column(type: 'string', unique: true)]
	private string $code;

	#[ORM\Column(type: 'integer', options: ['default' => 0])]
	private int $viewsCount;

	#[ORM\Column(type: Types::TEXT, nullable: true, options: ['default' => ""])]
	private string $description;

	#[ORM\Column(type: 'boolean', options: ['default' => 1])]
	private bool $isActive;

	#[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
	private DateTimeImmutable $createdAt;

	#[ORM\Column(type: 'datetime_immutable', options: ['default' => NULL])]
	private DateTimeImmutable $updatedAt;

	public function __construct(
		string $title,
		?string $description,
		bool $isActive = true,
	) {
		$this->id = null;
		$this->edit(
			title: $title,
			description: $description,
			isActive: $isActive,
		);
	}

	public function edit(string $title, string $description, bool $isActive): self {
		$this->title = $title;
		$this->description = $description;
		$this->isActive = $isActive;

		return $this;
	}

	public function __toString(): string {
		return $this->title;
	}

	public function getId(): ?int {
		return $this->id;
	}

	public function getTitle(): string {
		return $this->title;
	}

	public function setTitle(string $title): static {
		$this->title = $title;

		return $this;
	}

	public function getCode(): string {
		return $this->code;
	}

	public function setCode(): static {
		$this->code = Uuid::v1();

		return $this;
	}

	public function getViewsCount(): int {
		return $this->viewsCount;
	}

	public function setViewsCount(int $viewsCount): static {
		$this->viewsCount = $viewsCount;

		return $this;
	}

	public function getDescription(): string {
		return $this->description;
	}

	public function setDescription(string $description): static {
		$this->description = $description;

		return $this;
	}

	public function isActive(): bool {
		return $this->isActive;
	}

	public function setIsActive(bool $isActive): static {
		$this->isActive = $isActive;

		return $this;
	}

	public function getCreatedAt(): DateTimeImmutable {
		return $this->createdAt;
	}

	public function setCreatedAt(DateTimeImmutable $createdAt): static {
		$this->createdAt = $createdAt;

		return $this;
	}

	public function getUpdatedAt(): ?DateTimeImmutable {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?DateTimeImmutable $updatedAt): static {
		$this->updatedAt = $updatedAt;

		return $this;
	}
}
