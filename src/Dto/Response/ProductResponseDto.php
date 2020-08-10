<?php

declare(strict_types=1);

namespace App\Dto\Response;

use JMS\Serializer\Annotation as Serialization;

class ProductResponseDto
{
    /**
     * @Serialization\Type("string")
     */
    public string $code;

    /**
     * @Serialization\Type("string")
     */
    public string $title;

    /**
     * @Serialization\Type("string")
     */
    public string $description;

    /**
     * @Serialization\Type("integer")
     */
    public int $price;
}
