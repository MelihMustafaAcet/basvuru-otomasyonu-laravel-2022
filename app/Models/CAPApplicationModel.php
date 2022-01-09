<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CAPApplicationModel extends Model
{
    use HasFactory;

    protected $table = 'cap_application';

    public function applicationDetail ($studentId, $applicationId) {
        return DB::table('cap_application')
            ->join('users', 'cap_application.studentId', '=', 'users.id')
            ->join('faculty', 'faculty.id', '=', 'users.faculty')
            ->where('cap_application.studentId','=', $studentId)
            ->where('cap_application.id', '=', $applicationId)
            ->first();
    }

    public function awaitingApplications() {
        return DB::table('cap_application')
            ->join('users', 'cap_application.studentId', '=', 'users.id')
            ->where('isConfirmed', '=', 0)
            ->where('isDraft', '=', 0)
            ->where('file', '!=', null)
            ->select('*', 'cap_application.id as applicationId')
            ->get();
    }

    public function allApplications() {
        return DB::table('cap_application')
            ->join('users', 'cap_application.studentId', '=', 'users.id')
            ->select('*', 'cap_application.id as applicationId')
            ->get();
    }
}
