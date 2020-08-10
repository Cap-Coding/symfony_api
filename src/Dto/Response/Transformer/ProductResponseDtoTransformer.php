<?php

declare(strict_types=1);

namespace App\Dto\Response\Transformer;

use App\Dto\Exception\UnexpectedTypeException;
use App\Dto\Response\ProductResponseDto;
use App\Entity\Product;

class ProductResponseDtoTransformer extends AbstractResponseDtoTransformer
{
    /**
     * @param Product $product
     *
     * @return ProductResponseDto
     */
    public function transformFromObject($product): ProductResponseDto
    {
        if (!$product instanceof Product) {
            throw new UnexpectedTypeException('Expected type of Customer but got ' . \get_class($product));
        }

        $dto = new ProductResponseDto();
        $dto->code = $product->getCode();
        $dto->title = $product->getTitle();
        $dto->description = $product->getDescription();
        $dto->price = $product->getPrice();

        return $dto;
    }
}
