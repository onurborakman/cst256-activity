<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class OrderModel{
    private $product;
    private $customerID;
    function __construct($customerIdHere, $productHere) {
        $this->customerID = $customerIdHere;
        $this->product = $productHere;
    }
    function getProduct(){
        return $this->product;
    }
    function getCustomerID(){
        return $this->customerID;
    }
    function setCustomerID($id){
        $this->customerID = $id;
    }
}
?>
