<?php

declare(strict_types=1);

namespace App\Dto\Response\Transformer;

use App\Dto\Response\CustomerStatisticResponseDto;
use App\Dto\Response\ResponseDtoInterface;
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
     * @return ResponseDtoInterface
     */
    public function transformFromObject($customer): ResponseDtoInterface
    {
        $dto = new CustomerStatisticResponseDto();
        $dto->customerId = $customer->getId();
        $dto->totalOrderCount = $this->orderRepository->countAllByCustomer($customer);

        $dto->setTotalOrdersPrice(function() use ($customer) {
            return $this->orderRepository->totalPriceByCustomer($customer);
        });

        return $dto;
    }
}
