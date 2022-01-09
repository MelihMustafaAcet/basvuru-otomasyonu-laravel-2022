<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function adminLogin() {
        return view('auth.adminloginpage');
    }

    public function adminLoginAction(Request $request) {
        if (Auth::guard('web_admin')
            ->attempt(['email' => $request->get('email'), 'password' => $request->get('password')])){
            Alert::success('Başarılı!', 'Giriş yaptınız');

            return redirect()->route('panel.home');
        } else {
            Alert::alert('Hatalı!', 'Bilgilerinizi tekrar kontrol edin.');

            return redirect()->route('panel.login.page');
        }
    }

    public function adminLogout(){
        Auth::logout();
        Alert::success('Başarılı!', 'Çıkış yaptınız1');

        return redirect()->route('panel.login.page');
    }
}
