<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User\MailController;
use App\Models\FacultyModel;
use App\Models\SectionModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Mail\TestEmail;

class AuthController extends Controller
{
    protected $faculties;
    protected $sections;
    protected $uploadService;

    public function __construct() {
        $this->faculties = FacultyModel::all();
        $this->sections = SectionModel::all();
        $this->uploadService = new UploadController();
    }

    public function userLogin() {
        return view('auth.loginpage');
    }

    public function userRegister() {
        return view('auth.registerpage')->with('faculties', $this->faculties)->with('sections', $this->sections);
    }

    public function forgotMyPassword() {
        return view('auth.forgotmypassword');
    }

    public function generateResetCode(Request $request) {
        $user = User::where('email', '=', $request->get('email'));
        if ($user->exists()) {
            $resetCode = random_int(1000, 9999);
            $user = User::where('email', $request->get('email'))->first();
            $userModel = User::findOrFail($user->id);
            $userModel->resetCode = $resetCode;
            $userModel->save();

            $data = ['message' => 'This is a test!'];

            Mail::to('john@example.com')->send(new TestEmail($data));

            Alert::success('Başarılı!', 'Şifre sıfırlama talimatları Email adresinize gönderildi!');

            return redirect()->route('login.page');
        } else {
            Alert::error('Hata!', 'Kayıt yok!');

            return back();
        }
    }

    public function userRegisterAction(Request $request) {
        $request->validate([
            'nameSurname' => 'required',
            'studentNumber' => 'required',
            'identyNumber' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required',
            'birthday' => 'required',
            'password' => 'required',
            'repassword' => 'required|same:password',
            'university' => 'required',
            'faculty' => 'required',
            'section' => 'required',
            'class' => 'required',
            'address' => 'required',
        ]);

        $user = new User();
        $user->nameSurname = $request->get('nameSurname');
        $user->studentNumber = $request->get('studentNumber');
        $user->identyNumber = $request->get('identyNumber');
        $user->email = $request->get('email');
        $user->phoneNumber = $request->get('phoneNumber');
        $user->birthday = Date::make($request->get('birthday'));
        $user->password = Hash::make($request->get('password'));
        $user->university = $request->get('university');
        $user->faculty = $request->get('faculty');
        $user->section = $request->get('section');
        $user->class = $request->get('class');
        $user->address = $request->get('address');
        $user->photo = $this->uploadService->userImageUpload($request);

        if ($user->save()) {
            Alert::success('Başarılı!', 'Kayıdınız tamamlandı!');

            return redirect()->route('login.page');
        } else {
            Alert::error('Hata!', 'Kayıt esnasında bir problem oluştu!');

            return back();
        }
    }

    public function loginAction(Request $request) {
        $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];

        if (Auth::attempt($credentials, $request->get('remember'))){
            Alert::success('Başarılı!', 'Giriş yaptınız');
            return redirect()->route('student.homepage');
        } else {
            Alert::error('Hata!', 'Kullanıcı adı veya şifreniz yanlış!');

            return back();
        }
    }

    public function logout() {
        Auth::logout();
        Alert::success('Başarılı!', 'Çıkış yaptınız');
        return redirect()->route('login.page');
    }
}
