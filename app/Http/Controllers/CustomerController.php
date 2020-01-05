<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\QueryFilters\Active;
use App\QueryFilters\Sort;
use App\Repositories\CustomerRepositoryInterface;
use Cassandra\Custom;
use Illuminate\Pipeline\Pipeline;

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

    public function pipeline()
    {
        // $customers = Customer::query();

        $customers = $this->customerRepository->allCustomers();

        /*        if (request()->has('active')) {
                    $customers->where('active', request('active'));
                }
                if (request()->has('sort')) {
                    $customers->orderBy('name', request('sort'));
                }
           $customers = $customers->get();
        */
        return view('customers.index', compact('customers'));
    }
}
