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
        if(!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }

        return view('backend.home', [
        ]);
    }


    // public function save(Request $request)
    // {
    //     if(!Session::get('emp_name')) {
    //         return redirect()->route('keycloak.login');
    //     }

    //     // add new Purchase
    //     $link = new HR_Employee;
    //     $link->l_name = $request->input('l_name');
    //     $link->l_url = $request->input('l_url');

    //         //สุ่มอักษร
    //         function random_char($len){
    //             $chars = "ABDEFGHJMNPQRTWXYZabdefghjmnpqrtwxyz2346789"; //ตัวอักษรที่สามารถสุ่มได้
    //             $ret_char = "";
    //             $num = strlen($chars);
    //             for($i = 0; $i < $len; $i++) {
    //                 $ret_char.= $chars[rand()%$num];
    //                 $ret_char.=""; 
    //             }
    //             return $ret_char; 
    //         }

    //     $url_short = random_char(5);
    //     $link->l_url_short = 'https://www.dss.go.th/a/qr/'.$url_short;
    //     $link->l_code = $url_short;
    //     $link->l_user = 'คุณ'.Session::get('emp_name');
    //     $link->l_code_user = Session::get('emp_id');
    //     $link->l_status = 1;


    //     // ip Address
    //     if (getenv('HTTP_X_FORWARDED_FOR')) 
    //         $ip=getenv('HTTP_X_FORWARDED_FOR'); 
    //     else 
    //         $ip=getenv('REMOTE_ADDR');

    //     $link->ip = $ip;

    //     if($link->save()) {           
    //         Session::flash('success_msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    //         return redirect()->back();
    //     } else {
    //         return redirect()->back()->with('error_msg', 'ไม่สามารถบันทึกข้อมูลได้');
    //     }

    // }




    public function getDatatablesAdmin(Request $request)
    {
        if(!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }

        $data = P_EMP_ALL::select('emp_id', 'pfix_name', 'emp_name', 'pfix_name_e', 'english_name', 'image', 'division', 'sub_division', 'position_view', 'emp_type_name', 'dss_phone', 'dss_fax', 'dss_mail', 'dss_location', 'show_order');
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


    public function viewAdmin()
    {
        if(!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }
        
        return view('backend.viewAdmin');
    }



    public function getviewall($id)
    {
        if(!Session::get('username')) {
            return redirect()->route('login');
        }

        $data = P_EMP_ALL::where('id',$id)->first();
        // dd($data);          
        return response()->json($data);
    }




    // public function viewDetailSelf($id)
    // {    
    //     $data = HR_Employee::where('l_code',$id)->get();
    //     // dd($data);          
        
    //     return view('backend.viewdetailself', [
    //         'datas' => $data,
    //     ]);
    // }
    

    // public function viewDetailRedirect($id)
    // {    
    //     $data = HR_Employee::where('l_code',$id)->get();
    //     // dd($data); 
    //     $data_id = $data->first(); //ดึงค่าชุดแรก
    //     $l_id_count = $data_id->l_id;  //ชี้ค่าที่ต้องการใช้งาน
    //     $l_url_redirect = $data_id->l_url;  //ชี้ค่าที่ต้องการใช้งาน
    //     $l_status_check = $data_id->l_status;  //ชี้ค่าที่ต้องการใช้งาน

    //     if ($l_status_check == 1){
    //         HR_Employee::findOrFail($l_id_count)->increment('hits');
    //         return redirect($l_url_redirect);
    //     }else{
    //         return view('frontend.viewerror');
    //     }
    // }


    // public function viewDetailindex($id)
    // {    
    //     $data = HR_Employee::where('l_code',$id)->get();
    //     // dd($data); 
    //     $data_id = $data->first(); //ดึงค่าชุดแรก
    //     $l_id_count = $data_id->l_id;  //ชี้ค่าที่ต้องการใช้งาน

    //     HR_Employee::findOrFail($l_id_count)->increment('hits');

    //     return view('frontend.view', [
    //         'datas' => $data,
    //     ]);
    // }

    public function viewDetailAdmin($id)
    {    
        $data = P_EMP_ALL::where('emp_id',$id)->get();
        // dd($data); 
        // $data_id = $data->first(); //ดึงค่าชุดแรก
        // $l_id_count = $data_id->l_id;  //ชี้ค่าที่ต้องการใช้งาน

        return view('backend.viewdetail', [
            'datas' => $data,
        ]);
    }



    public function editAdmin(Request $request)
    {
        if(!Session::get('emp_name')) {
            return redirect()->route('keycloak.login');
        }

        $hr = HR_Employee::find($request->input('emp_id'));
        // dd($hr);

        $hr->dss_phone = $request->input('dss_phone');
        $hr->dss_fax = $request->input('dss_fax');
        $hr->dss_mail = $request->input('dss_mail');
        $hr->dss_location = $request->input('dss_location');


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

        if($hr->save()) {
            Session::flash('success_msg', 'แก้ไขข้อมูลเรียบร้อยแล้ว');
            return redirect()->back();
        } else {
            return redirect()->back()->with('error_msg', 'ไม่สามารถแก้ไขข้อมูลได้');
        }
        
    }



    // public function updatePurchaseAll(Request $request)
    // {
    //     if(!Session::get('username')) {
    //         return redirect()->route('login');
    //     }

    //     $purchase = Purchase::find($request->input('id_update'));

    //     $purchase->cat = $request->input('cat_update');
    //     $purchase->number = $request->input('number_update');
    //     $purchase->subject = $request->input('subject_update');
    //     $purchase->authoredit = Session::get('emp_name');
    //     $purchase->date = date('Y-m-d', strtotime($request->input('date_update')));

    //     //check upload new file
    //     $checkfilehave = $request->file('filename_new');
    //     // $checkfilenull = '';
    //     $pathOldFile = $request->input('filename_update');
    //     // dd($checkfilehave);
    //     if($checkfilehave !=''){
    //         File::delete(public_path('storage/pdf/'.$pathOldFile));
    //         $filename = date('Ymdhis').'.'.request()->file('filename_new')->getClientOriginalExtension();
    //         request()->file('filename_new')->move('storage/pdf', $filename);
    //         $purchase->filename = $filename;
    //     }

    //     $purchase->save();

    //     if($purchase->save()) {
    //         Session::flash('success_msg', 'แก้ไขข้อมูลเรียบร้อยแล้ว');
    //         return redirect()->back();
    //     } else {
    //         return redirect()->back()->with('error_msg', 'ไม่สามารถแก้ไขข้อมูลได้');
    //     }
        
    // }




}