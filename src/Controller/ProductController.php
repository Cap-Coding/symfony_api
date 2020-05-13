<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use App\Form\Type\ProductType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractApiController
{
    public function indexAction(Request $request): Response
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->respond($products);
    }

    public function createAction(Request $request): Response
    {
        $form = $this->buildForm(ProductType::class);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->respond($form, Response::HTTP_BAD_REQUEST);
        }

        /** @var Product $product */
        $product = $form->getData();

        $this->getDoctrine()->getManager()->persist($product);
        $this->getDoctrine()->getManager()->flush();

        return $this->respond($product);
    }
}
