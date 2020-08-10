<?php

declare(strict_types=1);

namespace App\Dto\Response\Transformer;

use App\Dto\Exception\UnexpectedTypeException;
use App\Dto\Response\CustomerStatisticResponseDto;
use App\Entity\Customer;
use App\Repository\OrderRepository;

class CustomerStatisticResponseDtoTransformer extends AbstractResponseDtoTransformer
{
    private OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @param Customer $customer
     *
     * @return CustomerStatisticResponseDto
     */
    public function transformFromObject($customer): CustomerStatisticResponseDto
    {
        if (!$customer instanceof Customer) {
            throw new UnexpectedTypeException('Expected type of Customer but got ' . \get_class($customer));
        }

        $dto = new CustomerStatisticResponseDto();
        $dto->customerId = $customer->getId();
        $dto->ordersTotalCount = $this->orderRepository->getTotalCountByCustomer($customer);

        $dto->setOrdersTotalPrice(function() use ($customer) {
            return $this->orderRepository->getTotalPriceByCustomer($customer);
        });

        return $dto;
    }
}
