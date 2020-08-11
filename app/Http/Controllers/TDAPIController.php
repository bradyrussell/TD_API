<?php

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TDAPIController extends Controller
{
    //

    public function getUserDetails(){
        $key = \request()->session()->get('authkey');
        if(empty($key) || is_null($key)) return redirect('/');

        $client = new Client();
        $a = $client->get("https://help.uillinois.edu/TDWebApi/api/auth/getuser", ['headers'=>['Authorization'=>"Bearer $key"]]);

        dd($a, json_decode( $a->getBody()->getContents()));
    }
}
