<?php

namespace App\Http\Controllers;

use App\Models\P_EMP_ALL;
use App\Models\Glb_Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class FrontendController extends Controller
{

    public function index()
    {
            //นับจำนวนบุคลากรแต่ละประเภท 1 ข้าราช 2 ลูกจ้างประจำ 3 จ้างเหมา A พนักงานราชการ
            $p1acount = P_EMP_ALL::where('EMP_TYPE', '1')->get();
            $p1 = $p1acount->count();
            $p2acount = P_EMP_ALL::where('EMP_TYPE', '2')->get();
            $p2 = $p2acount->count();
            $p3acount = P_EMP_ALL::where('EMP_TYPE', '3')->get();
            $p3 = $p3acount->count();
            $p4acount = P_EMP_ALL::where('EMP_TYPE', 'A')->get();
            $p4 = $p4acount->count();

            $pall = $p1+$p2+$p3+$p4;

        return view('frontend.index', [
            'p1' => $p1,
            'p2' => $p2,
            'p3' => $p3,
            'p4' => $p4,
            'pall' => $pall,
        ]);
    }


    public function getDataSn(Request $request)
    {
        $data = P_EMP_ALL::select('emp_id', 'pfix_name', 'emp_name', 'pfix_name_e', 'english_name', 'image', 'division', 'sub_division', 'position_view', 'emp_type_name', 'dss_phone', 'dss_fax', 'dss_mail', 'dss_location', 'show_order')
        ->orderBy('show_order');
        // dd($data);
        // dd($request->searchName);

            return Datatables::eloquent($data)
            ->filter(function ($query) use ($request) {
            if ($request->has('emp_name')) {
                $query->where('emp_name', 'like', "%{$request->emp_name}%");
            }
            })
            ->make(true);
        }


    public function sn()
    {
        return view('frontend.sn');
    }

    // public function sn()
    // {
    //     $sn = P_EMP_ALL::all();
    //     // dd($sn);

    //     return view('frontend.sn', [
    //         'sn' => $sn,
    //     ]);
    // }


    public function getDataSt(Request $request)
    {
        $data = P_EMP_ALL::select('emp_id', 'pfix_name', 'emp_name', 'pfix_name_e', 'english_name', 'image', 'division', 'sub_division', 'position_view', 'emp_type_name', 'dss_phone', 'dss_fax', 'dss_mail', 'dss_location', 'show_order')
        ->orderBy('show_order');
        // dd($data);
        // dd($request->searchName);

            return Datatables::eloquent($data)
            ->filter(function ($query) use ($request) {
            if ($request->has('dss_phone')) {
                $query->where('dss_phone', 'like', "%{$request->dss_phone}%");
            }
            })
            ->make(true);
        }


    public function st()
    {
        return view('frontend.st');
    }



    public function getDataSo(Request $request)
    {
        $data = P_EMP_ALL::select('emp_id', 'pfix_name', 'emp_name', 'pfix_name_e', 'english_name', 'image', 'division', 'sub_division', 'position_view', 'emp_type_name', 'dss_phone', 'dss_fax', 'dss_mail', 'dss_location', 'show_order')
        ->orderBy('show_order');
        // dd($data);
        // ddd($request->division);

        return Datatables::eloquent($data)
            ->filter(function ($query) use ($request) {
            if ($request->has('division')) {
                $query->where('division', 'like', "$request->division");
            }
            })
            ->make(true);
    }



    public function so()
    {
        $max = Glb_Organization::max('org_code');
        $max_org_code = substr($max, 0, 2) . '_____000';

        $glborganization = Glb_Organization::where('org_code', 'like', $max_org_code)
            ->orderBy('org_code')
            ->get();

            return view('frontend.so', [
                'glborganization' => $glborganization,
            ]);
    }




}