<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    // Fetch data
    public function fetchAccount() {
        $data = DB::table('users')->get();
        return $data;
    }

    // Add account
    public function addAccount(Request $req) {
        DB::table('users')->insert([
            'username' => $req['username'],
            'password' => $req['password'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => 'admin'
        ]);
    }
}
