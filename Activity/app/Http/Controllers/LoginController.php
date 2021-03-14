<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Business\SecurityService;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index(Request $request){
        //Added for Activity 3
        //Test the form variables being passed in
        //echo "This is a test";
        Log::info("Entering LoginController Index()");
        $this->validateForm($request);

        $username = $request->input('username');
        $password = $request->input('password');
        $user = new UserModel($username, $password);
        Log::info("Parameters are: ",
            array(
                "username"=>$username,
                "password"=>$password
            ));
        $result = (new SecurityService)->login($user);
        if($result == true){
            Log::info("Exit LoginController with Login Passed");
            //Added fir webpage security test
            session()->put("security", "enabled");
            return view('loginPassed2')
                ->with('model', $user);
        }else{
            Log::info("Exit LoginController with Login Failed");
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

    //Logout Method
    public function logout(Request $request){
        Auth::logout();
        //Added for webpage security test
        session()->put("security", "disabled");
        Log::info("Logging out...");
        return redirect("/login2");
    }
}
