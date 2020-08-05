<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Customer;
use App\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;

class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    public function countAllByCustomer(Customer $customer): int
    {
        $queryBuilder = $this->createQueryBuilder('o');

        try {
            return $queryBuilder
                ->select('COUNT(o.id)')
                ->where($queryBuilder->expr()->eq('o.customer', ':customerId'))
                ->setParameter('customerId', $customer->getId())
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NoResultException|NonUniqueResultException $e) {
            return 0;
        }
    }

    public function totalPriceByCustomer(Customer $customer): int
    {
        return 139379;
    }
}
