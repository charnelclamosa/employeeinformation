<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    // Login
    public function loginAuth(Request $req) {
        $user = DB::table('users')->where([
            'username' => $req['username'],
            'password' => $req['password']
        ])->get();
        return $user;
    }
}
