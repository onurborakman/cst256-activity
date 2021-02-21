<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Services\Business\CustomerService;

class CustomerController extends Controller
{
    public function index(Request $request){
        $customer = new CustomerModel(
            $request->input('firstname'),
            $request->input('lastname')
        );
        /*$result = (new CustomerService())->addCustomer($customer);
        if($result == true){
            echo("Customer Data Added Successfully");
        }else{
            echo("Customer Data Was Not Added");
        }*/
        $nextID = 0;
        return view('order')
            ->with('nextID', $nextID)
            ->with('firstname', $customer->getFirstname())
            ->with('lastname', $customer->getLastname());
    }
}
