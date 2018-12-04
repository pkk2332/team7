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

        if (\Auth::check()) {

            if (\Auth::user()->admin_id==null) {
                   abort('404');
            }

            $userrole = Admin::find(\Auth::user()->admin_id)->role;
            $data = explode("|", $role);

            foreach ($data as $key) {
                if ($key==$userrole) {
                    return $next($request);
                }

            }
            abort('404');
        }
        
        redirect('/login');
    }
}
