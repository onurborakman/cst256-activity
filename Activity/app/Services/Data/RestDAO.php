<?php
namespace App\Services\Data;

use App\Models\UserModel;
use Illuminate\Support\Facades\DB;

class RestDAO {
    public function findAllUsers(){
        return DB::table('users')->get();
    }
    public function findUserByID($id){
        return DB::table('users')->where('id', $id)->first();
    }
}
?>
