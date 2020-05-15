<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Customer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends AbstractApiController
{
    public function indexAction(Request $request): Response
    {
        $customers = $this->getDoctrine()->getRepository(Customer::class)->findAll();

        return $this->json($customers);
    }

    public function createAction(Request $request): Response
    {
        return new Response();
    }
}
