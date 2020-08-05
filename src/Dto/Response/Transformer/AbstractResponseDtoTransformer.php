<?php

declare(strict_types=1);

namespace App\Dto\Response\Transformer;

abstract class AbstractResponseDtoTransformer implements ResponseDtoTransformerInterface
{
    /**
     * @inheritdoc
     */
    public function transformFromObjects(iterable $items): iterable
    {
        $dtos = [];
        foreach ($items as $item) {
            $dtos[] = $this->transformFromObject($item);
        }

        return $dtos;
    }
}
