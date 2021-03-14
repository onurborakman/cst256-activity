<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class MySecurityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Step 1: You can use the following to get the route URI
        //$request->path() or
        //we can also use $request->is()
        $path = $request->path();
        Log::info("Entering My Security Middleware in handle() at path: " .
        $path);
        //Step 2: Run the business rules that check for the URIs that you do not need to secure
        $secureCheck = true;
        if($request->is("/")
        || $request->is("login2")
        || $request->is("dologin2")
        || $request->is("usersrest")
        || $request->is("usersrest/*")
        || $request->is("loggingservice")
        || $request->is("usersrestguzzle")
        || $request->is("usersrestguzzle/*")){
            $secureCheck = false;
        }
        Log::info($secureCheck ? "Security Middleware in handle()... Needs Security"
        : "Security Middleware in handle()... No Security Required");
        //Step 3: If entering a secure URI with no security token then do a redirect
        //to the login page
        if(session()->get("security") == "enabled"){
            return $next($request);
        }
        if($secureCheck){
            Log::info("Leaving My Security Middleware in handle()
            doing a redirect to login");
            return redirect("/login2");
        }
        return $next($request);
    }
}
