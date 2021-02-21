<?php
namespace App\Services\Data;
use App\Models\OrderModel;
use http\Exception;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerModel;
use App\Services\Data\Utility\DBConnect;
use mysqli;

class OrderDAO {

    private $dbObj;

    public function __construct($dbObj)
    {
        $this->dbObj = $dbObj;
    }
    //Method to add order
    public function addOrder(OrderModel $order){
        try{
            $product = $order->getProduct();
            $customerID = $order->getCustomerID();
            $sql = "INSERT INTO `orders` (`id`,`product`, `customer_id`) VALUES (NULL,'$product', '$customerID')";
            $result = $this->dbObj->query($sql);
            if($result === TRUE){
                return true;
            }else{
                return false;
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }

    }

}
?>
