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
            'status' => 'Active',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => 'admin'
        ]);
    }

    // Edit account
    public function updateAccount(Request $req) {
        DB::table('users')->where('username', $req['username'])->update([
            'password' => $req['password'],
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $req['updated_by']
        ]);
    }

    // Deactivate account
    public function deleteAccount(Request $req) {
        DB::table('users')->where('id', $req['id'])->update([
            'status' => 'Deactivated',
            'deleted_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $req['updated_by']
        ]);
    }

    //Reactivate account
    public function reactivateAccount(Request $req) {
        DB::table('users')->where('id', $req['id'])->update([
            'status' => 'Active',
            'deleted_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $req['updated_by']
        ]);
    }
}
