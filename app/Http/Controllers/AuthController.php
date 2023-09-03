<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Gis;
use App\Models\Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $is_login = $request->session()->get('is_login');

        if($is_login){
            return redirect('/');
        }else{
            return view('login')->with('data');
        }
    }

    public function login(Request $request)
    {
        $data = Auth::where('nama_user', $request->username)->where('password', $request->password)->get();
        if(count($data) > 0){
            $request->session()->put('is_login', true);
            // $is_login = $request->session()->get('is_login');
            return redirect('/');
        }else{
            $data = 'Data dengan username dan password tersebut tidak ditemukan!';
            return view('login')->with('data', $data);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('is_login');
        return redirect('/');
    }
}
