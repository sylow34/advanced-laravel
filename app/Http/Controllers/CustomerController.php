<?php

namespace App\Http\Controllers;

use App\Repositories\CustomerRepositoryInterface;

class CustomerController extends Controller
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        return $this->customerRepository->all();
    }

    public function show($customerId)
    {
        return $this->customerRepository->findById($customerId);
    }

    public function update($customerId)
    {
        $this->customerRepository->update($customerId);
        return redirect('/customer/' . $customerId);
    }

    public function destroy($customerId)
    {
        $this->customerRepository->delete($customerId);
        return redirect('/customers/');
    }
}
