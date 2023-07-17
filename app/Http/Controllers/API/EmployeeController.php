<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\P_EMP_ALL;

class EmployeeController extends Controller
{
    public function user($engname)
    {
        // dd($engname."%");
        $employee = P_EMP_ALL::where('english_name', $engname."%")
            ->first();

        if ($employee) {
            return response()->json([
                'data' => $employee,
                'status' => 200
            ]);
        }

        return response()->json(['message' => 'ไม่พบข้อมูล', 'status' => 204]);
    }


}
