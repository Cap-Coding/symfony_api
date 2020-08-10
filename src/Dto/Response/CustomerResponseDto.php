<?php

declare(strict_types=1);

namespace App\Dto\Response;

use JMS\Serializer\Annotation as Serialization;

class CustomerResponseDto
{
    /**
     * @Serialization\Type("string")
     */
    public string $email;

    /**
     * @Serialization\Type("string")
     */
    public string $phoneNumber;
}
