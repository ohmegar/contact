<?php

namespace App\Http\Controllers;

use App\Models\HR_Employee;
use App\Models\P_EMP_ALL;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class DssController extends Controller
{

    public function backendindex()
    {
        if (!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }

        return view('backend.home', []);
    }



    public function getDatatablesAdmin(Request $request)
    {
        if (!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }

        $data = P_EMP_ALL::select('emp_id', 'pfix_name', 'emp_name', 'pfix_name_e', 'english_name', 'image', 'division', 'sub_division', 'position_view', 'emp_type_name', 'dss_phone', 'dss_fax', 'dss_mail', 'dss_location', 'show_order', 'line_token', 'status_line');
        // dd($data);
        // dd($request->search);

        return Datatables::eloquent($data)
            ->filter(function ($query) use ($request) {
                if ($request->has('emp_name')) {
                    $query->where('emp_name', 'like', "%{$request->emp_name}%");
                }
                if ($request->has('english_name')) {
                    $query->where('english_name', 'like', "%{$request->english_name}%");
                }
                if ($request->has('emp_id')) {
                    $query->where('emp_id', 'like', "%{$request->emp_id}%");
                }
            })
            ->make(true);
    }


    public function viewAdmin()
    {
        if (!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }

        return view('backend.viewAdmin');
    }



    public function getviewall($id)
    {
        if (!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }

        $data = P_EMP_ALL::where('id', $id)->first();
        // dd($data);          
        return response()->json($data);
    }





    // IT admin จัดการข้อมูล
    public function viewDetailAdmin($id)
    {
        $data = P_EMP_ALL::where('emp_id', $id)->get();
        // dd($data); 
        // $data_id = $data->first(); //ดึงค่าชุดแรก
        // $l_id_count = $data_id->l_id;  //ชี้ค่าที่ต้องการใช้งาน

        return view('backend.viewdetail', [
            'datas' => $data,
        ]);
    }



    public function editAdmin(Request $request)
    {
        if (!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }

        $hr = HR_Employee::find($request->input('emp_id'));
        // dd($hr);

        $hr->dss_phone = $request->input('dss_phone');
        $hr->dss_fax = $request->input('dss_fax');
        $hr->dss_mail = $request->input('dss_mail');
        $hr->dss_location = $request->input('dss_location');
        $hr->show_order = $request->input('show_order');


        // Handle File Upload
        if ($request->hasFile('image')) {
            $oldPic = $request->input('oldImage');
            if (File::exists(public_path('storage/images/profile/') . $oldPic)) {
                File::delete(public_path('storage/images/profile/') . $oldPic);
                // Get just ext
                $extension = $request->file('image')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $hr->emp_id . date('His') . '.' . $extension;
                // Upload Image
                $request->file('image')->storeAs('public/images/profile/', $fileNameToStore);
                // save
                $hr->image = $fileNameToStore;
            } else {
                // Get just ext
                $extension = $request->file('image')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $hr->emp_id . date('His') . '.' . $extension; // ให้ใช้ emp_id ต่อกับ time   
                // Upload Image
                $request->file('image')->storeAs('public/images/profile/', $fileNameToStore);
                // save
                $hr->image = $fileNameToStore;
            }
        }


        $hr->save();

        if ($hr->save()) {
            Session::flash('success_msg', 'แก้ไขข้อมูลเรียบร้อยแล้ว');
            return redirect()->back();
        } else {
            return redirect()->back()->with('error_msg', 'ไม่สามารถแก้ไขข้อมูลได้');
        }
    }


    // เจ้าของข้อมูลจัดการได้เอง
    public function viewDetailProcurement()
    {
        $data = P_EMP_ALL::where('emp_id', Session::get('emp_id'))->get();
        // dd($data); 
        // $data_id = $data->first(); //ดึงค่าชุดแรก
        // $l_id_count = $data_id->l_id;  //ชี้ค่าที่ต้องการใช้งาน

        return view('backend.info', [
            'datas' => $data,
        ]);
    }


    public function editinfo(Request $request)
    {
        if (!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }

        $hr = HR_Employee::find(Session::get('emp_id'));
        // dd($hr);

        $hr->dss_phone = $request->input('dss_phone');
        $hr->dss_fax = $request->input('dss_fax');
        $hr->dss_mail = $request->input('dss_mail');
        $hr->dss_location = $request->input('dss_location');
        $hr->line_token = $request->input('line_token');

        // Handle File Upload
        if ($request->hasFile('image')) {
            $oldPic = $request->input('oldImage');
            if (File::exists(public_path('storage/images/profile/') . $oldPic)) {
                File::delete(public_path('storage/images/profile/') . $oldPic);
                // Get just ext
                $extension = $request->file('image')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $hr->emp_id . date('His') . '.' . $extension;
                // Upload Image
                $request->file('image')->storeAs('public/images/profile/', $fileNameToStore);
                // save
                $hr->image = $fileNameToStore;
            } else {
                // Get just ext
                $extension = $request->file('image')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $hr->emp_id . date('His') . '.' . $extension; // ให้ใช้ emp_id ต่อกับ time   
                // Upload Image
                $request->file('image')->storeAs('public/images/profile/', $fileNameToStore);
                // save
                $hr->image = $fileNameToStore;
            }
        }


        $hr->save();

        if ($hr->save()) {
            Session::flash('success_msg', 'แก้ไขข้อมูลเรียบร้อยแล้ว');
            return redirect()->back();
        } else {
            return redirect()->back()->with('error_msg', 'ไม่สามารถแก้ไขข้อมูลได้');
        }
    }
}
