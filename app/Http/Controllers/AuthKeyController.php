<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthKeyController extends Controller
{
    //
    public function setAuthKey()
    {
        //
        $auth = \request()->post('auth');
        if(empty($auth) || is_null($auth)) return response()->noContent(400);

        \request()->session()->put("authkey", $auth);
        return redirect('/b');
    }

    public function getAuthKey()
    {
        $key = \request()->session()->get('authkey');
        if(empty($key) || is_null($key)) return response()->noContent(400);

        return response()->make($key);
    }
}
