<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check())
        {
            return redirect()->route('admin_top');
        }

        return redirect()->route('login');
    }

    public function formLogin()
    {
        if (Auth::check())
        {
            return redirect()->route('admin_top');
        }
        return view('admin.login.form_login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('admin_top');
        }
        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::guard()->logout();

        Session::flush();

        return redirect()->route('login');
    }
}
