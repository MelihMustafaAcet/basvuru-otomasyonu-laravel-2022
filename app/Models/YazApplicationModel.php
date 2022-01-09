<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class YazApplicationModel extends Model
{
    use HasFactory;

    protected $table = 'yaz_application';

    public function applicationDetail ($studentId, $applicationId) {
        return DB::table('yaz_application')
            ->join('users', 'yaz_application.studentId', '=', 'users.id')
            ->join('faculty', 'faculty.id', '=', 'users.faculty')
            ->where('yaz_application.studentId','=', $studentId)
            ->where('yaz_application.id', '=', $applicationId)
            ->first();
    }

    public function awaitingApplications() {
        return DB::table('yaz_application')
            ->join('users', 'yaz_application.studentId', '=', 'users.id')
            ->where('isConfirmed', '=', 0)
            ->where('isDraft', '=', 0)
            ->where('file', '!=', null)
            ->select('*', 'yaz_application.id as applicationId')
            ->get();
    }

    public function allApplications() {
        return DB::table('yaz_application')
            ->join('users', 'yaz_application.studentId', '=', 'users.id')
            ->select('*', 'yaz_application.id as applicationId')
            ->get();
    }
}
