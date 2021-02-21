<?php
namespace App\Services\Business;
use App\Models\OrderModel;
use App\Services\Data\CustomerDAO;
use App\Models\CustomerModel;
use App\Services\Data\OrderDAO;

class OrderService{

    private $orderDAO;

    public function __construct(){
        $this->orderDAO = new OrderDAO();
    }

    public function addOrder(OrderModel $order){
        return $this->orderDAO->addOrder($order);
    }
}
?>
