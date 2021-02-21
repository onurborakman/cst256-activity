<?php
namespace App\Services\Data;
use Illuminate\Support\Facades\DB;
class SecurityDAO {
    public function findByUser($user){
        $result = DB::table('users')
            ->where('username', $user->getUsername())
            ->where('password', $user->getPassword())
            ->get();
       if(count($result) == 0){
            return false;
        }else{
            return true;
        }
    }
}
?>
