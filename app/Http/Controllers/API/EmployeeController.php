<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\P_EMP_ALL;
use App\Models\Glb_Organization;

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

    public function organization()
    {
        $max = Glb_Organization::max('org_code');
        $max_org_code = substr($max, 0, 2) . '_____000';

        $glborganization = Glb_Organization::where('org_code', 'like', $max_org_code)
            ->orderBy('org_code')
            ->get();

            return response()->json($glborganization);
    }

    public function user_org($id)
    {
        $user_org = P_EMP_ALL::select('*')
            ->where('division', 'like', $id)
            ->get();

        return response()->json($user_org);
    }

    public function organizationAll()
    {
        // $max = Glb_Organization::max('org_code');
        // $max_org_code = substr($max, 0, 2) . '_____000';

        $glborganization = Glb_Organization::select()
            ->orderBy('org_code')
            ->get();

            return response()->json($glborganization);
    }
    
}
