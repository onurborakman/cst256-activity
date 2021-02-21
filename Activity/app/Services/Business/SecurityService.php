<?php
namespace App\Services\Business;
use App\Models\CustomerModel;
use App\Models\OrderModel;
use App\Services\Data\CustomerDAO;
use App\Services\Data\OrderDAO;
use App\Services\Data\SecurityDAO;
use App\Models\UserModel;
use App\Services\Data\Utility\DBConnect;

class SecurityService{

    public function login($user){
        return (new SecurityDAO)->findByUser($user);
    }
    //Method to add all the infos (customer and order) at the same time ACID TRANSACTIONS
    public function addAllInfo(CustomerModel $customer, OrderModel $order){
        //Create a connection to the database
        //Create an instance of the class
        $conn = new DBConnect("activity");
        //Call the method to create the connection
        $conn->getDbConnect();
        //First turn off auto commit
        $conn->setDbAutoCommitFalse();
        //Begin transaction
        $conn->beginTransaction();
        //Instantiate the Data Access Layer
        $customerDAO = new CustomerDAO($conn->getConn());
        //Instantiate the Data Access Layer
        $orderDAO = new OrderDAO($conn->getConn());
        //Next Customer ID
        $nextID = $customerDAO->getNextID();
        //Add the customer data
        $order->setCustomerID($nextID);
        $successCustomer = $customerDAO->addCustomer($customer);
        //Add product order data
        $successOrder = $orderDAO->addOrder($order);
        if($successCustomer && $successOrder){
            $conn->commitTransaction();
            return true;
        }else{
            $conn->rollbackTransaction();
            return false;
        }
    }
}
?>
