<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class UserModel implements \JsonSerializable {
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

    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
        return get_object_vars($this);
    }
}
?>
