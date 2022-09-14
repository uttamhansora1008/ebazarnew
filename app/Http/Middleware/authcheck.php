<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authcheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(empty(auth('api')->user())){
            $flag = "false";
            $data='';
            $error = "Unauthorized";
        return $this->setresponse($flag, $data, $error);
    }else{
    return $next($request);
    }
    }
    function setresponse($flag, $data, $error)
    {
        if($flag=='false'){
            return response()->json(['flag' => $flag, 'error' => $error]);
        }else{
            return response()->json(['flag' => $flag, 'data' => $data, 'error' => $error]);
        }
    }

    
}
