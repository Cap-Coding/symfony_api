<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractApiController
{
    public function indexAction(Request $request): Response
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->json($products);
    }

    public function createAction(Request $request): Response
    {
        return new Response();
    }
}
