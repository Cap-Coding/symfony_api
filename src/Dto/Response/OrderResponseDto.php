<?php

declare(strict_types=1);

namespace App\Dto\Response;

use JMS\Serializer\Annotation as Serialization;

class OrderResponseDto implements ResponseDtoInterface
{
    /**
     * @Serialization\Type("DateTime<'Y-m-d\TH:i:s'>")
     */
    public \DateTime $createdAt;

    /**
     * @Serialization\Type("string")
     */
    public ?string $comment;

    /**
     * @Serialization\Type("App\Dto\Response\CustomerResponseDto")
     */
    public CustomerResponseDto $customer;

    /**
     * @Serialization\Type("array<App\Dto\Response\ProductResponseDto>")
     */
    public array $products;
}
