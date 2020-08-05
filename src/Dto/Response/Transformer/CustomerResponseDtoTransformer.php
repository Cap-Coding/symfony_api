<?php

declare(strict_types=1);

namespace App\Dto\Response\Transformer;

use App\Dto\Response\CustomerResponseDto;
use App\Dto\Response\ResponseDtoInterface;
use App\Entity\Customer;

class CustomerResponseDtoTransformer extends AbstractResponseDtoTransformer
{
    /**
     * @param Customer $customer
     *
     * @return ResponseDtoInterface
     */
    public function transformFromObject($customer): ResponseDtoInterface
    {
        $dto = new CustomerResponseDto();
        $dto->email = $customer->getEmail();
        $dto->phoneNumber = $customer->getPhoneNumber();

        return $dto;
    }
}
