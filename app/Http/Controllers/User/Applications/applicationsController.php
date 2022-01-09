<?php

namespace App\Http\Controllers\User\Applications;

use App\Http\Controllers\Controller;
use App\Models\CAPApplicationModel;
use App\Models\YazApplicationModel;
use Illuminate\Support\Facades\Auth;

class applicationsController extends Controller
{
    public function applications() {
        $cap = CAPApplicationModel::where('studentId', Auth::id())->get();
        $yaz = YazApplicationModel::where('studentId', Auth::id())->get();

        return view('user.myapplications')->with('cap', $cap)->with('yaz', $yaz);
    }
}
