<?php
namespace App\Services\Data;
use http\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SecurityDAO {
    public function findByUser($user){
        try{
            $result = DB::table('users')
                ->where('username', $user->getUsername())
                ->where('password', $user->getPassword())
                ->get();
            if(count($result) == 0){
                return false;
            }else{
                return true;
            }
        }catch (Exception $e){
            Log::error("Exception in SecurityDAO" . $e);
            echo $e->getMessage();
        }

    }
}
?>
