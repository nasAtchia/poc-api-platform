<?php

declare(strict_types=1);

namespace App\Document;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProductRepository;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ODM\MongoDB\Types\Type;

#[ApiResource]
#[ODM\Document(collection: 'products', repositoryClass: ProductRepository::class)]
class Product
{
    #[ODM\Id(type: Type::INT, strategy: 'INCREMENT')]
    private ?int $id = null;

    #[ODM\Field(type: Type::STRING, nullable: true)]
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
