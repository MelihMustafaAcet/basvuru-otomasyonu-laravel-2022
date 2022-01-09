<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function userImageUpload(Request $request){
        $request->validate([
            'photo' => 'required|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($request->file()) {
            $fileName = time().'_'. $request->file('photo')->getClientOriginalName();
            Storage::disk('local')->putFileAs('public/images', $request->file('photo'), $fileName);

            return $fileName;
        } else {
            return false;
        }
    }

    public function fileUpload(Request $request){
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        $studentName = Str::slug(Auth::user()->nameSurname, '_');

        if($request->file()) {
            $fileName = Auth::user()->studentNumber . '_' . $studentName . '_' . time().'.' . $request->file('file')->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('public/file', $request->file('file'), $fileName);

            return $fileName;
        } else {
            return false;
        }
    }
}
