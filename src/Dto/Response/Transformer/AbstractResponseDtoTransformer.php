<?php

declare(strict_types=1);

namespace App\Dto\Response\Transformer;

abstract class AbstractResponseDtoTransformer implements ResponseDtoTransformerInterface
{
    /**
     * @inheritdoc
     */
    public function transformFromObjects(iterable $objects): iterable
    {
        $dtos = [];
        foreach ($objects as $object) {
            $dtos[] = $this->transformFromObject($object);
        }

        return $dtos;
    }
}
