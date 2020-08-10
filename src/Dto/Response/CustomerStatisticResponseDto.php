<?php

declare(strict_types=1);

namespace App\Dto\Response;

use JMS\Serializer\Annotation as Serialization;

/**
 * @Serialization\VirtualProperty(
 *     "completedOrders",
 *     exp="object.getCompletedOrders()",
 *     options={@Serialization\SerializedName("completed_orders")}
 * )
 */
class CustomerStatisticResponseDto
{
    /**
     * @Serialization\Type("int")
     */
    public int $customerId;

    /**
     * @Serialization\Type("int")
     */
    public int $ordersTotalCount;

    /**
     * @Serialization\Type("int")
     * @Serialization\Accessor(getter="getOrdersTotalPrice")
     * @Serialization\Groups("Admin")
     */
    private \Closure $ordersTotalPrice;

    /**
     * @return int
     */
    public function getOrdersTotalPrice(): int
    {
        $callable = $this->ordersTotalPrice;
        return $callable();
    }

    /**
     * @param \Closure $ordersTotalPrice
     */
    public function setOrdersTotalPrice(\Closure $ordersTotalPrice): void
    {
        $this->ordersTotalPrice = $ordersTotalPrice;
    }

    public function getCompletedOrders(): int
    {
        return random_int(10, 25);
    }
}
