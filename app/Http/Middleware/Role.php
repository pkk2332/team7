<?php

namespace App\Http\Middleware;

use Closure;
use App\Admin;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        
        $userrole = Admin::find(\Auth::user()->admin_id)->role;
        if ( auth()->check()) {
            $data = explode("|", $role);

            foreach ($data as $key) {
                if ($key==$userrole) {
                    return $next($request);
                }

            }
            abort('403');
        }
        
        redirect('/login');
    }
}
