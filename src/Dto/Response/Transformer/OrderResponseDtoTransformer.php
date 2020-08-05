<?php

declare(strict_types=1);

namespace App\Dto\Response\Transformer;

use App\Dto\Response\OrderResponseDto;
use App\Dto\Response\ResponseDtoInterface;
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
     * @return ResponseDtoInterface
     */
    public function transformFromObject($order): ResponseDtoInterface
    {
        $dto = new OrderResponseDto();
        $dto->createdAt = $order->getCreatedAt();
        $dto->comment = $order->getComment();
        $dto->customer = $this->customerResponseDtoTransformer->transformFromObject($order->getCustomer());
        $dto->products = $this->productResponseDtoTransformer->transformFromObjects($order->getProducts());

        return $dto;
    }
}
