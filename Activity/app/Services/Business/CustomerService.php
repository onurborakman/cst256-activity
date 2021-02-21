<?php
namespace App\Services\Business;
use App\Services\Data\CustomerDAO;
use App\Models\CustomerModel;
class CustomerService{

    private $customerDAO;

    public function __construct(){
        $this->customerDAO = new CustomerDAO();
    }

    public function addCustomer(CustomerModel $customer){
        return $this->customerDAO->addCustomer($customer);
    }
}
?>
