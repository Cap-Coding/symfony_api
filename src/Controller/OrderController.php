<?php

declare(strict_types=1);

namespace App\Controller;

use App\Dto\Response\Transformer\OrderResponseDtoTransformer;
use App\Entity\Order;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends AbstractApiController
{
    private OrderResponseDtoTransformer $orderResponseDtoTransformer;

    public function __construct(OrderResponseDtoTransformer $orderResponseDtoTransformer)
    {
        $this->orderResponseDtoTransformer = $orderResponseDtoTransformer;
    }

    public function showAction(Request $request): Response
    {
        $orders = $this->getDoctrine()->getRepository(Order::class)->findAll();

        $order = reset($orders);

        $dto = $this->orderResponseDtoTransformer->transformFromObject($order);

        return $this->respond($dto);
    }
}
