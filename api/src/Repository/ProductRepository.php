<?php

declare(strict_types=1);

namespace App\Repository;

use App\Document\Product;
use Doctrine\Bundle\MongoDBBundle\ManagerRegistry;
use Doctrine\Bundle\MongoDBBundle\Repository\ServiceDocumentRepository;

/**
 * @extends ServiceDocumentRepository<Product>
 *
 * @method Product|null find( $id, $lockMode = 0, $lockVersion = null )
 * @method Product|null findOneBy( array $criteria, array $sort = null )
 * @method Product[]    findAll()
 * @method Product[]    findBy( array $criteria, array $orderBy = null, $limit = null, $offset = null )
 */
class ProductRepository extends ServiceDocumentRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }
}
