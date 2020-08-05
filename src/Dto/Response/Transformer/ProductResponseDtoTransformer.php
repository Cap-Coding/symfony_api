<?php

declare(strict_types=1);

namespace App\Dto\Response\Transformer;

use App\Dto\Response\ProductResponseDto;
use App\Dto\Response\ResponseDtoInterface;
use App\Entity\Product;

class ProductResponseDtoTransformer extends AbstractResponseDtoTransformer
{
    /**
     * @param Product $product
     *
     * @return ResponseDtoInterface
     */
    public function transformFromObject($product): ResponseDtoInterface
    {
        $dto = new ProductResponseDto();
        $dto->code = $product->getCode();
        $dto->title = $product->getTitle();
        $dto->description = $product->getDescription();
        $dto->price = $product->getPrice();

        return $dto;
    }
}
