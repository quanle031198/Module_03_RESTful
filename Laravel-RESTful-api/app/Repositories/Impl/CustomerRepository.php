<?php

namespace App\Repositories\Impl;

use App\Models\Customer;
use App\Repositories\CustomerRepositoryInterFace;
use App\Repositories\Eloquent\EloquentRepository;

class CustomerRepository extends EloquentRepository implements CustomerRepositoryInterFace
{

    public function getModel()
    {
        return Customer::class;
    }
}