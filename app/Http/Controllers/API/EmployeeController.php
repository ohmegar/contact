<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\P_EMP_ALL;

class EmployeeController extends Controller
{
    // public function user($engname)
    // {
    //     $employee = P_EMP_ALL::where('english_name', 'like', $engname)
    //         ->first();

    //     if ($employee != '') {
    //         return response()->json([
    //             'data' => $employee,
    //             'status' => 200
    //         ]);
    //     } else {
    //         return response()->json(['message' => 'ไม่พบข้อมูล', 'status' => 204]);
    //     }
    // }

    public function user($engname)
    {
        $employee = P_EMP_ALL::select('*')
            ->where('english_name', 'like', $engname)
            ->first();

        return response()->json($employee);
    }

    public function userall($engname)
    {
        $employee = P_EMP_ALL::select('*')
            ->get();

        return response()->json($employee);
    }


}
