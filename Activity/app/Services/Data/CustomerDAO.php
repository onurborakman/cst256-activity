<?php
namespace App\Services\Data;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerModel;
use App\Services\Data\Utility\DBConnect;
use mysqli;

class CustomerDAO {

    private $dbObj;
    public function __construct($dbObj)
    {
        $this->dbObj = $dbObj;
    }

    //Method to add customer
    public function addCustomer(CustomerModel $customer){
        try{
            $product = $customer->getFirstname();
            $id = $customer->getLastname();
            $sql = "INSERT INTO `customers` (`id`,`firstname`, `lastname`) VALUES (NULL,'$product', '$id')";
            $result = $this->dbObj->query($sql);
            if($result === TRUE){
                return true;
            }else{
                echo "CUSTOMER DID NOT INSERTED";
                return false;
            }
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
    //Method to get the next customer id
    public function getNextID(){
        $sql = "SELECT id FROM customers ORDER BY id DESC LIMIT 1";
        $result = $this->dbObj->query($sql);
        $row = mysqli_fetch_array($result);
        $max = $row['id'];
        return $max + 1;
    }

}
?>
