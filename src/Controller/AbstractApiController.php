<?php

declare(strict_types=1);

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractApiController extends AbstractFOSRestController
{
    protected const SERIALIZATION_GROUP_DEFAULT = 'Default';
    protected const SERIALIZATION_GROUP_ADMIN = 'Admin';

    private array $serializationGroups = [
        self::SERIALIZATION_GROUP_DEFAULT,
    ];

    protected function respond($data, int $statusCode = Response::HTTP_OK): Response
    {
        $view = $this->view($data, $statusCode);
        $view->getContext()->setGroups($this->serializationGroups);

        return $this->handleView($view);
    }

    protected function addSerializationGroup(string $serializationGroup): void
    {
        $this->serializationGroups[] = $serializationGroup;
    }
}
