<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use App\Models\OrderModel;
use App\Services\Business\CustomerService;
use App\Services\Business\OrderService;
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){
        $order = new OrderModel(
            $request->get('customer_id'),
            $request->get('product')
        );
        $customer = new CustomerModel(
            $request->input('firstname'),
            $request->input('lastname')
        );
        $result = (new SecurityService())->addAllInfo($customer, $order);
        if($result == true){
            echo("Order Data Committed Successfully");
        }else{
            echo("Order Data Was Rolled Back");
        }
        return view('order')->with('nextID', "")->with('firstname', "")->with('lastname', "");
    }

    //Validation added for Activity 3
    public function validateForm(Request $request){

    }
}
