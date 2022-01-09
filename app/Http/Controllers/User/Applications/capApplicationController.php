<?php

namespace App\Http\Controllers\User\Applications;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;
use App\Models\CAPApplicationModel;
use App\Models\SectionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade as PDF;

class capApplicationController extends Controller
{
    protected $capApplicationModel;
    protected $uploadService;

    public function __construct() {
        $this->capApplicationModel = new CAPApplicationModel();
        $this->uploadService = new UploadController();
    }

    public function applicationForm() {
        $sections = SectionModel::all();
        return view('user.capapplicationform')->with('sections', $sections);
    }

    public function applicationAction(Request $request) {
        $request->validate([
            'studiedPeriod' => 'required',
            'gpa' => 'required',
            'classSuccessPercentage' => 'required',
            'semester' => 'required',
            'option1' => 'required',
        ]);

        $application = new CAPApplicationModel();
        $application->studiedPeriod = $request->get('studiedPeriod');
        $application->studentId = Auth::id();
        $application->gpa = $request->get('gpa');
        $application->classSuccessPercentage = $request->get('classSuccessPercentage');
        $application->semester = $request->get('semester');
        $application->option1 = $request->get('option1');
        if ($request->get('option2') != 'unseleceted') {
            $application->option2 = $request->get('option2');
        }
        if ($request->get('option3') != 'unseleceted') {
            $application->option3 = $request->get('option3');
        }

        if($application->save()) {
            Alert::success('Başvurunuz alındı!', 'Başvuru formunu indirip, imzalayıp ardından sisteme tekrar yükleyiniz.');

            $this->applicationPreview(Auth::id(), $application->id);
            return redirect()->route('student.my.applications');
        }
    }

    public function applicationPreview($studentId, $applicationId) {
        $data = $this->capApplicationModel->applicationDetail($studentId, $applicationId);

        $pdf = PDF::loadView('user.capview', compact('data'));
        return $pdf->download('basvuru.pdf');
    }

    public function uploadFilePage($studentId, $applicationId) {
        $data = ['studentId' => $studentId, 'applicationId' => $applicationId];
        return view('user.uploadfile')->with('data', $data)->with('success', false);
    }

    public function uploadFile(Request $request, $studentId, $applicationId) {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        $application = CAPApplicationModel::findOrFail($applicationId);
        $data = ['studentId' => $studentId, 'applicationId' => $applicationId];

        if ($application->file != null) {
            Alert::error('Daha önce yükleme yapılmış!', 'Formu tekrar gönderemezsiniz.');
            return;
        }
        $application->file = $this->uploadService->fileUpload($request);
        $application->isDraft = 0;
        if ($application->save()) {
            return view('user.uploadfile')->with('data', $data)->with('success', true);
        }
    }
}
