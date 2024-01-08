<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\P_EMP_ALL;

class EmployeeController extends Controller
{
    public function user($engname)
    {
        $employee = P_EMP_ALL::select('*')
            ->where('english_name', 'like', $engname)
            ->first();

        return response()->json($employee);
    }

    public function userall()
    {
        $employee = P_EMP_ALL::select('*')
            ->get();

        return response()->json($employee);
    }

    public function id($id)
    {
        $employee = P_EMP_ALL::select('*')
            ->where('emp_id', 'like', $id)
            ->first();

        return response()->json($employee);
    }
}
