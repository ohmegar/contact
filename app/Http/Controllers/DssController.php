<?php

namespace App\Http\Controllers;

use App\Models\HR_Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class DssController extends Controller
{

    public function backendindex()
    {
        if(!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }

        return view('backend.home', [
        ]);
    }


    public function save(Request $request)
    {
        if(!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }

        // add new Purchase
        $link = new HR_Employee;
        $link->l_name = $request->input('l_name');
        $link->l_url = $request->input('l_url');

            //สุ่มอักษร
            function random_char($len){
                $chars = "ABDEFGHJMNPQRTWXYZabdefghjmnpqrtwxyz2346789"; //ตัวอักษรที่สามารถสุ่มได้
                $ret_char = "";
                $num = strlen($chars);
                for($i = 0; $i < $len; $i++) {
                    $ret_char.= $chars[rand()%$num];
                    $ret_char.=""; 
                }
                return $ret_char; 
            }

        $url_short = random_char(5);
        $link->l_url_short = 'https://www.dss.go.th/a/qr/'.$url_short;
        $link->l_code = $url_short;
        $link->l_user = 'คุณ'.Session::get('emp_name');
        $link->l_code_user = Session::get('emp_id');
        $link->l_status = 1;


        // ip Address
        if (getenv('HTTP_X_FORWARDED_FOR')) 
            $ip=getenv('HTTP_X_FORWARDED_FOR'); 
        else 
            $ip=getenv('REMOTE_ADDR');

        $link->ip = $ip;

        if($link->save()) {           
            Session::flash('success_msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');
            return redirect()->back();
        } else {
            return redirect()->back()->with('error_msg', 'ไม่สามารถบันทึกข้อมูลได้');
        }

    }


    public function getDatatablesView(Request $request)
    {
        if(!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }

        $data = HR_Employee::whereIn('l_status', [1,2])
        ->where('l_code_user', '=', Session::get('emp_id')); 
        // dd($data);
        // $Datatables = app('datatables'); //app, datatable เป็นชื่อตัวแปรห้ามแก้ไข

        return Datatables::eloquent($data)
        ->filter(function ($query) use ($request) {


        if ($request->has('l_name')) {
            $query->where('l_name', 'like', "%{$request->l_name}%");
        }
        })
        ->make(true);
    }



    public function getDatatablesViewAll(Request $request)
    {
        if(!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }

        $data = HR_Employee::where('l_status', 1); 
        // dd($data);
        // $Datatables = app('datatables'); //app, datatable เป็นชื่อตัวแปรห้ามแก้ไข

        return Datatables::eloquent($data)
        ->filter(function ($query) use ($request) {


        if ($request->has('l_name')) {
            $query->where('l_name', 'like', "%{$request->l_name}%");
        }
        })
        ->make(true);
    }


    public function view()
    {
        if(!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }
        
        return view('backend.view');
    }


    public function viewall()
    {
        if(!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }
        
        return view('backend.viewall');
    }


    public function viewDetail($id)
    {    
        $data = HR_Employee::where('l_code',$id)->get();
        // dd($data);          
        
        return view('backend.viewdetail', [
            'datas' => $data,
        ]);
    }


    public function viewDetailSelf($id)
    {    
        $data = HR_Employee::where('l_code',$id)->get();
        // dd($data);          
        
        return view('backend.viewdetailself', [
            'datas' => $data,
        ]);
    }
    

    public function viewDetailRedirect($id)
    {    
        $data = HR_Employee::where('l_code',$id)->get();
        // dd($data); 
        $data_id = $data->first(); //ดึงค่าชุดแรก
        $l_id_count = $data_id->l_id;  //ชี้ค่าที่ต้องการใช้งาน
        $l_url_redirect = $data_id->l_url;  //ชี้ค่าที่ต้องการใช้งาน
        $l_status_check = $data_id->l_status;  //ชี้ค่าที่ต้องการใช้งาน

        if ($l_status_check == 1){
            HR_Employee::findOrFail($l_id_count)->increment('hits');
            return redirect($l_url_redirect);
        }else{
            return view('frontend.viewerror');
        }
    }


    public function viewDetailindex($id)
    {    
        $data = HR_Employee::where('l_code',$id)->get();
        // dd($data); 
        $data_id = $data->first(); //ดึงค่าชุดแรก
        $l_id_count = $data_id->l_id;  //ชี้ค่าที่ต้องการใช้งาน

        HR_Employee::findOrFail($l_id_count)->increment('hits');

        return view('frontend.view', [
            'datas' => $data,
        ]);
    }


    public function update(Request $request)
    {
        if(!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }

        $link = HR_Employee::find($request->input('l_id_update'));

        $link->l_name = $request->input('l_name_update');
        $link->l_url = $request->input('l_url_update');
        $link->l_status = $request->input('l_status_update');

        $link->save();

        if($link->save()) {
            Session::flash('success_msg', 'แก้ไขข้อมูลเรียบร้อยแล้ว');
            return redirect()->back();
        } else {
            return redirect()->back()->with('error_msg', 'ไม่สามารถแก้ไขข้อมูลได้');
        }
        
    }



    public function del(Request $request)
    {
        if(!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }

        $link = HR_Employee::find($request->input('l_id_cfdel'));
        $link->l_status = 0;

        $link->save();

        if($link->save()) {
            return redirect()->back()->with('success_msg', 'ลบข้อมูลเรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error_msg', 'ไม่สามารถลบข้อมูลได้');
        }
    }



    public function getDatatablesDss(Request $request)
    {
            $data = HR_Employee::where('l_status', 1); 
            // dd($data);
            // $Datatables = app('datatables'); //app, datatable เป็นชื่อตัวแปรห้ามแก้ไข

            return Datatables::eloquent($data)
            ->filter(function ($query) use ($request) {


            if ($request->has('l_name')) {
                $query->where('l_name', 'like', "%{$request->l_name}%");
            }
            })
            ->make(true);
        }

    
    public function indexgetviewall($id)
    {
        $data = HR_Employee::where('l_id',$id)->first();
        // dd($data);          
        return response()->json($data);
    }


}