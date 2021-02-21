<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class UserModel{
    private $username;
    private $password;
    function __construct($usernameHere, $passwordHere) {
        $this->username = $usernameHere;
        $this->password = $passwordHere;
    }
    function getUsername(){
        return $this->username;
    }
    function getPassword(){
        return $this->password;
    }
}
?>
