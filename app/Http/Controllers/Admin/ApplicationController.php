<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CAPApplicationModel;
use App\Models\YazApplicationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ApplicationController extends Controller
{
    protected $yazModel;
    protected $capModel;

    public function __construct()
    {
        $this->yazModel = new YazApplicationModel();
        $this->capModel = new CAPApplicationModel();
    }

    public function awaitingApplications() {
        $yazApplications = $this->yazModel->awaitingApplications();
        $capApplications = $this->capModel->awaitingApplications();

        return view('admin.applications')->with('yazApplications', $yazApplications)->with('capApplications', $capApplications);
    }

    public function applicationUpdate($type, $studentId, $applicationId, $status = -1) {
        $tableName = $type . '_application';
        $update = DB::table($tableName)
            ->where('studentId', '=', $studentId)
            ->where('id', '=', $applicationId)
            ->update(['isConfirmed' => $status]);

        if ($update) {
            Alert::success('Başarılı', 'İşleminiz başarıyla gerçekleştirildi');
        } else {
            Alert::error('Hata', 'İşlem sırasında bir hata oluştu');
        }

        return redirect()->route('panel.awaiting');
    }

    public function allApplications() {
        $yazApplications = $this->yazModel->allApplications();
        $capApplications = $this->capModel->allApplications();

        return view('admin.allapplications')->with('yazApplications', $yazApplications)->with('capApplications', $capApplications);
    }
}
