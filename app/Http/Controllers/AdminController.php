<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;


class AdminController extends Controller
{
    public function login()
    {
        return view('pages.login');
    }

    public function submit_login(Request $request)
    {
        $request->validate([
            'username'  =>  'required',
            'password'  =>  'required'
        ]);
        $userCheck = Admin::where([
            'username'  =>  $request->username,
            'password'  =>  $request->password,
        ])->count();
        if ($userCheck > 0) {
            $adminData = Admin::where(['username' => $request->username, 'password'=>$request->password])->first();
            session(['adminData' => $adminData]);
            return redirect('admin/dashboard');
        }
        else {
            return redirect('admin/login')->with('error', 'Invalid username/password');
        }
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function logout()
    {
        session()->forget(['adminData']);
        return redirect('admin/login');
    }
}
