<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = 3;
        $user = Auth::user()->id;
        $consulta = User::whereHas('type_users', function ($query) use ($role, $user) { 
            $query->where('type_user_id',$role)->where('user_id',$user); })->get();

        if($consulta and $consulta != null and !empty($consulta) and count($consulta) > 0) {
            return $next($request);
        } else {
            return redirect()->route('home');
        }
        
    }
}
