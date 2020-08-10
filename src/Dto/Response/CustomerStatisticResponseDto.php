<?php

declare(strict_types=1);

namespace App\Dto\Response;

use JMS\Serializer\Annotation as Serialization;

/**
 * @Serialization\VirtualProperty(
 *     "firstName",
 *     exp="object.getFirstName()",
 *     options={@Serialization\SerializedName("my_first_name")}
 *  )
 */
class CustomerStatisticResponseDto
{
    /**
     * @Serialization\Type("integer")
     */
    public int $customerId;

    /**
     * @Serialization\Type("integer")
     */
    public int $totalOrderCount;

    /**
     * @Serialization\Type("int")
     * @Serialization\Accessor(getter="getTotalOrdersPrice")
     * @Serialization\Groups({"Admin"})
     */
    private \Closure $totalOrdersPrice;

    /**
     * @return int
     */
    public function getTotalOrdersPrice(): int
    {
        $callable = $this->totalOrdersPrice;

        return $callable();
    }

    /**
     * @param \Closure $totalOrdersPrice
     */
    public function setTotalOrdersPrice(\Closure $totalOrdersPrice): void
    {
        $this->totalOrdersPrice = $totalOrdersPrice;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return 'My name';
    }
}
