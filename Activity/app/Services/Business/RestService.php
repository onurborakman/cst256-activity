<?php
namespace App\Services\Business;

use App\Services\Data\RestDAO;

class RestService{

    private $restDAO;

    public function __construct(){
        $this->restDAO = new RestDAO();
    }

    public function getAllUsers(){
        return $this->restDAO->findAllUsers();
    }
    public function findUserByID($id){
        return $this->restDAO->findUserByID($id);
    }
}
?>
