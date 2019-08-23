<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;

class CustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); // ->only(['index', 'store']) or you can do ->except(['store', 'update'])
        //  This is in the constructor which means for every method you need to be signed in.
       // $this->middleware('can:update,project')->except(['index', 'store', 'create']);
    }

    public function index()
    {
        $customers = auth()->user()->customers;
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store()
    {
        $attributes = $this->validateCustomer();
        $attributes['owner_id'] = auth()->id();
        Customer::create($attributes);
        return redirect('/customers');
    }

    public function show(Customer $customer)
    {
        $this->authorize('update', $customer);
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer) //example.com/customers/{id}/edit
    {
        $this->authorize('update', $customer);
        return view('customers.edit', compact('customer'));
    }

    public function update(Customer $customer)
    {
        $this->authorize('update', $customer);
        $customer->update($this->validateCustomer());
        session()->flash('updatemessage', 'Successfully updated your contact!');
        return redirect('/customers/' . $customer->id  );
    }

    public function destroy(Customer $customer)
    {
        $this->authorize('update', $customer);
        $customer->delete();
        return redirect('/customers');
    }

    protected function validateCustomer()
    {
        return request()->validate([
            'firstname' => ['required', 'min:3', 'max:255'],
            'lastname' => ['required', 'min:3', 'max:255'],
            'address' => ['min:3', 'max:255', 'nullable'],
            'housenumber' => ['nullable', 'integer'],
            'postalcode' => ['nullable', 'max:7'],
            'city' => ['nullable', 'max:200'],
            'phonenumber' => ['nullable', 'numeric'],
            'mobile' => ['nullable', 'numeric'],
            'email' => ['max:100', 'email:rfc,dns'],
            'dateofbirth' => ['date_format:Y-m-d', 'before:today', 'nullable'],
            'gender' => ['nullable'],
        ]);
    }
}



