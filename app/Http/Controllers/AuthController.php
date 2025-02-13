<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loginkasir(Request $request)
    {
        if (Auth::guard('kasir')->attempt
        ([
            'kode_kasir' => $request->kode_kasir,
            'password' => $request->password]))
       {
            dd('berhasil: '.Auth::guard('kasir')->user());
            log::info('login berhasil');
            //return redirect('/user/dashboard');
        }
        else{
            echo"login gagal";
            //return redirect('/user')->with('warning', 'NIS./Password Salah');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function logouthkasir()
    {
        if(auth::guard('kasir')->check()) {
            auth::guard('kasir')->logout();
            return redirect('/kasir');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function loginadmin(Request $request)
    {
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password, ]))
        {
            dd('berhasil: '.Auth::guard('admin')->user());
            log::info('login berhasil');
            //return redirect('/user/dashboard');
        }
        else{
            echo"login gagal";
            //return redirect('/user')->with('warning', 'NIS./Password Salah');

    }

    /**
     * Display the specified resource.
     */
    public function logoutadmin()
    {
        else{
            echo"login gagal";
            //return redirect('/user')->with('warning', 'NIS./Password Salah');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function logoutadmin()
    {
        if(auth::guard('admin')->check()) {
            auth::guard('admin')->logout();
            return redirect('/admin');
        }
    }


}
