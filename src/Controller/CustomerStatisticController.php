<?php

declare(strict_types=1);

namespace App\Controller;

use App\Dto\Response\Transformer\CustomerStatisticResponseDtoTransformer;
use App\Entity\Customer;
use Symfony\Component\HttpFoundation\Response;

class CustomerStatisticController extends AbstractApiController
{
    private CustomerStatisticResponseDtoTransformer $customerStatisticResponseDtoTransformer;

    public function __construct(CustomerStatisticResponseDtoTransformer $customerStatisticResponseDtoTransformer)
    {
        $this->customerStatisticResponseDtoTransformer = $customerStatisticResponseDtoTransformer;
    }

    public function indexAction(): Response
    {
        $customers = $this->getDoctrine()->getRepository(Customer::class)->findAll();

        $customer = reset($customers);

        if (false/*\in_array('ROLE_ADMIN', $this->getUser()->getRoles(), true)*/) {
            $this->addSerializationGroup(AbstractApiController::SERIALIZATION_GROUP_ADMIN);
        }

        $dto = $this->customerStatisticResponseDtoTransformer->transformFromObject($customer);

        return $this->respond($dto);
    }
}
