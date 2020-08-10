<?php

declare(strict_types=1);

namespace App\Dto\Response\Transformer;

use App\Dto\Exception\UnexpectedTypeException;
use App\Dto\Response\OrderResponseDto;
use App\Entity\Order;

class OrderResponseDtoTransformer extends AbstractResponseDtoTransformer
{
    private CustomerResponseDtoTransformer $customerResponseDtoTransformer;
    private ProductResponseDtoTransformer $productResponseDtoTransformer;

    public function __construct(
        CustomerResponseDtoTransformer $customerResponseDtoTransformer,
        ProductResponseDtoTransformer $productResponseDtoTransformer
    ) {
        $this->customerResponseDtoTransformer = $customerResponseDtoTransformer;
        $this->productResponseDtoTransformer = $productResponseDtoTransformer;
    }

    /**
     * @param Order $order
     *
     * @return OrderResponseDto
     */
    public function transformFromObject($order): OrderResponseDto
    {
        if (!$order instanceof Order) {
            throw new UnexpectedTypeException('Expected type of Order but got ' . \get_class($order));
        }

        $dto = new OrderResponseDto();
        $dto->createdAt = $order->getCreatedAt();
        $dto->comment = $order->getComment();
        $dto->customer = $this->customerResponseDtoTransformer->transformFromObject($order->getCustomer());
        $dto->products = $this->productResponseDtoTransformer->transformFromObjects($order->getProducts());

        return $dto;
    }
}
