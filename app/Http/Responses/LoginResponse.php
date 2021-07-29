<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        if(auth()->user()->role_id === 1) {

            return response()->json(['fullname' => auth()->user()->fullname, 'role' => strval(auth()->user()->role_id)]);  

        } else {

            $user = [
                'fullname' => auth()->user()->fullname,
                'company' => auth()->user()->tenant->enterprise,
                'role' => strval(auth()->user()->role_id)
            ];
            return response()->json($user)->withCookie(cookie('tenant_id_cookie', auth()->user()->tenant_id));
        }
    }
}
