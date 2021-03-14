<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class MyTestMiddleware
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
        Log::info("Entering My Test Middleware in handle()");
        //Using the Data Cache in Laravel
        //Step 1:Get an instance of one of the Caches
        //(In this case the file)
        //Step 2:Get a value from the Cache
        //and if the Cache value is not there we will put it in the Cache
        if($request->username != NULL){
            Log::info("In not null...: " . $request->username);
            $value = Cache::store("file")->get("mydata");
            if($value == NULL){
                Log::info("Caching first time Username for: " .
                $request->username);
                Cache::store("file")
                    ->put(
                        "mydata",
                        $request->username,
                        1
                    );
            }
        }else{
            $value = Cache::store("file")->get("mydata");
            if($value != NULL){
                Log::info("Getting Username from Cache: " .
                $value);
            }else{
                Log::info("Could not get Username from Cache
                 (data is older than 1 min)");
            }
        }
        return $next($request);
    }
}
