<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Business\SecurityService;
use App\Models\UserModel;
class LoginController extends Controller
{
    public function index(Request $request){
        //Added for Activity 3
        //Test the form variables being passed in
        echo "This is a test";
        $this->validateForm($request);

        $username = $request->input('username');
        $password = $request->input('password');
        $user = new UserModel($username, $password);
        $result = (new SecurityService)->login($user);
        if($result == true){
            return view('loginPassed2')
                ->with('model', $user);
        }else{
            return view('loginFailed')
                ->with('model', $user);
        }
    }
    //Validation added for Activity 3
    private function validateForm(Request $request){
        //Setup Data Validation Rules for Login Form
        $rules = ['username'=>'Required | Between: 4, 10 | Alpha','password'=>'Required | Between: 4, 10'];
        //Run Data Validation Rules
        $this->validate($request, $rules);
    }
}
