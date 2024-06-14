<?php

declare(strict_types=1);

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Document\Product;
use App\Repository\ProductRepository;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

final readonly class ProductProvider implements ProviderInterface
{
    public function __construct(
        #[Autowire(service: 'api_platform.doctrine_mongodb.odm.state.item_provider')]
        private ProviderInterface $itemProvider,
        private ProductRepository $productRepository
    ) {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): ?Product
    {
        /** @var Product|null $product */
        $product = $this->itemProvider->provide($operation, $uriVariables, $context);

        if (!$product) {
            return null;
        }

        $this->productRepository->getDocumentManager()->refresh($product);

        return $product;
    }
}
