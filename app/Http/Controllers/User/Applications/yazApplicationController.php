<?php

namespace App\Http\Controllers\User\Applications;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;
use App\Models\CAPApplicationModel;
use App\Models\YazApplicationModel;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\SectionModel;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class yazApplicationController extends Controller
{
    protected $yazApplicationModel;
    protected $uploadService;

    public function __construct() {
        $this->yazApplicationModel = new YazApplicationModel();
        $this->uploadService = new UploadController();
    }

    public function applicationForm() {
        $sections = SectionModel::all();
        return view('user.yazapplicationform')->with('sections', $sections);
    }

    public function applicationAction(Request $request) {
        $request->validate([
            'teacher' => 'required',
            'university' => 'required',
            'kou_1' => 'required',
            'university_1' => 'required'
        ]);

        $application = new YazApplicationModel();
        $application->university = $request->get('university');
        $application->studentId = Auth::id();
        $application->teacher = $request->get('teacher');
        $application->kou_1 = $request->get('kou_1');
        $application->university_1 = $request->get('university_1');

        if ($request->get('kou_2') != null) {
            $application->kou_2 = $request->get('kou_2');
            $application->university_2 = $request->get('university_2');
        }

        if ($request->get('kou_3') != null) {
            $application->kou_3 = $request->get('kou_3');
            $application->university_3 = $request->get('university_3');
        }

        if($application->save()) {
            Alert::success('Başvurunuz alındı!', 'Başvuru formunu indirip, imzalayıp ardından sisteme tekrar yükleyiniz.');

            return redirect()->route('student.my.applications');
        }
    }

    public function applicationPreview($studentId, $applicationId) {
        $data = $this->yazApplicationModel->applicationDetail($studentId, $applicationId);

        $pdf = PDF::loadView('user.yazview', compact('data'));
        return $pdf->download('basvuru.pdf');
    }

    public function uploadFilePage($studentId, $applicationId) {
        $data = ['studentId' => $studentId, 'applicationId' => $applicationId];
        return view('user.yazuploadfile')->with('data', $data)->with('success', false);
    }

    public function uploadFile(Request $request, $studentId, $applicationId) {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        $application = YazApplicationModel::findOrFail($applicationId);
        $data = ['studentId' => $studentId, 'applicationId' => $applicationId];

        if ($application->file != null) {
            Alert::error('Daha önce yükleme yapılmış!', 'Formu tekrar gönderemezsiniz.');
            return;
        }
        $application->file = $this->uploadService->fileUpload($request);
        $application->isDraft = 0;
        if ($application->save()) {
            return view('user.yazuploadfile')->with('data', $data)->with('success', true);
        }
    }
}
