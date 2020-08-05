<?php

declare(strict_types=1);

namespace App\Dto\Response\Transformer;

use App\Dto\Response\ResponseDtoInterface;

interface ResponseDtoTransformerInterface
{
    public function transformFromObject($object): ?ResponseDtoInterface;

    public function transformFromObjects(iterable $items): iterable;
}
