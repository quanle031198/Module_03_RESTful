<?php
namespace App\Services\Impl;

use App\Repositories\CustomerRepositoryInterFace;
use App\Services\CustomerServiceInterFace;

class CustomerService implements CustomerServiceInterFace
{
    protected $customerRepository;

    public function __construct(CustomerRepositoryInterFace $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAll()
    {
        return $this->customerRepository->getAll();
    }
    public function findById($id)
    {
        $customer = $this->customerRepository->findById($id);

        $statusCode = 200;
        if(!$customer)
        {
            $statusCode = 400;
        }

        return [
            'statusCode' => $statusCode,
            'customers' => $customer
        ];
    }

    public function create($request)
    {
         $customer = $this->customerRepository->create($request);

         $statusCode = 201;
        if (!$customer) {
            $statusCode = 500;
        }

        return [
            'statusCode' => $statusCode,
            'customers' => $customer
        ];
    }

    public function update($request, $id)
    {
        $oldCustomer = $this->customerRepository->findById($id);

        if(!$oldCustomer)
        {
            $newCutomer = null;
            $statusCode = 404;
        }
        else
        {
            $newCutomer = $this->customerRepository->update($request, $oldCustomer);
            $statusCode = 200;
        }

        return [
            'statusCode' => $statusCode,
            'customers' => $newCutomer
        ];
    }

    public function destroy($id)
    {
        $customer = $this->customerRepository->findById($id);

        $statusCode = 404;
        $message = 'User not found';
        if($customer)
        {
            $this->customerRepository->destroy($customer);
            $statusCode = 200;
            $message = 'Delete success !';
        }

        return [
            'statusCode' => $statusCode,
            'message' => $message
        ];
    }
}