<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CustomerModel{
    private $firstname;
    private $lastname;
    function __construct($firstnameHere, $lastnameHere) {
        $this->firstname = $firstnameHere;
        $this->lastname = $lastnameHere;
    }
    function getFirstname(){
        return $this->firstname;
    }
    function getLastname(){
        return $this->lastname;
    }
}
?>
