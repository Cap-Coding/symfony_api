<?php

declare(strict_types=1);

namespace App\Dto\Exception;

class UnexpectedTypeException extends \RuntimeException
{
    private const CODE = 113;

    public function __construct(string $message)
    {
        parent::__construct($message, self::CODE);
    }
}
