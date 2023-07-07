<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class KeycloakController extends Controller
{
    public function keycloakSession()
    {
        //  เรียกใช้ external API ด้วย Guzzle
        $response = Http::get('http://api.dss.local/api/employee/eng-name/' . auth()->user()->name);
        $emp = json_decode($response, true);
        // $emp = ['emp_name' => 'ทดสอบ'];
        if (empty($emp)) {
            // แจ้งเตือนไม่พบข้อมูลในระบบบุคลากร
            Session::flush();
            return redirect()->route('keycloak.logout')->with('warning_msg', 'ไม่พบข้อมูลของท่านในฐานข้อมูลบุคลากร');
        
        
        } else {
            // หากพบข้อมูล ระบบจะสร้าง session emp_id สำหรับเรียกใช้งาน
            session(['emp_id' => $emp['emp_id'],  //รหัส
            'user_title' => $emp['user_title'],  //คำนำหน้า
            'emp_name' => $emp['emp_name'],  //ชื่อ
            'position' => $emp['position'], //ตำแหน่ง
            'div_id' => $emp['div_id'], //รหัสกอง
            'division' => $emp['division'], //ชื่อกอง
            'org_id' => $emp['org_id'],  //รหัสกลุ่ม
            'sub_division' => $emp['sub_division']]);   //ชื่อกลุ่ม

            return redirect()->route('backendindex');
        }
    }

}
