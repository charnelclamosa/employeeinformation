<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    // Fetch data
    public function fetchAccount() {
        $data = DB::table('companies')->get();
        return $data;
    }

    // Add company
    public function addAccount(Request $req) {
        DB::table('companies')->insert([
            'username' => $req['username'],
            'password' => $req['password'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => 'admin'
        ]);
    }

    // Edit company
    public function updateAccount(Request $req) {
        DB::table('companies')->where('username', $req['username'])->update([
            'password' => $req['password'],
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $req['updated_by']
        ]);
    }
}
