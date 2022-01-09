<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Applications\yazApplicationController;
use App\Models\CAPApplicationModel;
use App\Models\User;
use App\Models\YazApplicationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $capModel;
    protected $yazModel;

    public function __construct()
    {
        $this->capModel = new CAPApplicationModel();
        $this->yazModel = new YazApplicationModel();
    }

    public function dashboard() {
        $statistics = $this->prepareDashboardStatistics();

        return view('admin.homepage')->with('statistics', $statistics);
    }

    public function prepareDashboardStatistics() {
        $capApplications = CAPApplicationModel::all();
        $yazApplications = YazApplicationModel::all();
        $awaitingApprovalCapApplication = $this->capModel->awaitingApplications();
        $awaitingApprovalYazApplication = $this->yazModel->awaitingApplications();
        $users = User::all();

        return [
            'totalApplication' => $capApplications->count() + $yazApplications->count(),
            'userCount' => $users->count(),
            'awaitingApplication' => $awaitingApprovalCapApplication->count() + $awaitingApprovalYazApplication->count()
        ];
    }
}
