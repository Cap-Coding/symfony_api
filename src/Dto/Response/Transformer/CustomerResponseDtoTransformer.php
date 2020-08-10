<?php

declare(strict_types=1);

namespace App\Dto\Response\Transformer;

use App\Dto\Exception\UnexpectedTypeException;
use App\Dto\Response\CustomerResponseDto;
use App\Entity\Customer;

class CustomerResponseDtoTransformer extends AbstractResponseDtoTransformer
{
    /**
     * @param Customer $customer
     *
     * @return CustomerResponseDto
     */
    public function transformFromObject($customer): CustomerResponseDto
    {
        if (!$customer instanceof Customer) {
            throw new UnexpectedTypeException('Expected type of Customer but got ' . \get_class($customer));
        }

        $dto = new CustomerResponseDto();
        $dto->email = $customer->getEmail();
        $dto->phoneNumber = $customer->getPhoneNumber();

        return $dto;
    }
}
