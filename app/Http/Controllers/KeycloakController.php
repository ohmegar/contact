<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class KeycloakController extends Controller
{
    public function keycloakSession()
    {
        // dd(auth()->user()->id);
        //  เรียกใช้ external API ด้วย Guzzle
        // $response = Http::get('http://contact.dss.local/api/user/' . auth()->user()->name);
        // $response = Http::get('http://localhost/contact/public/api/id/' . auth()->user()->id);
        $response = Http::get('http://contact.dss.local/api/id/' . auth()->user()->id);

        $emp = json_decode($response, true);

        if ($emp == null) {
            // แจ้งเตือนไม่พบข้อมูลในระบบบุคลากร
            session(['status' => 405, 'msg' => 'ไม่พบข้อมูล Emp. ID ใน AD']);

            return redirect()->route('permission');

        } else {
            // หากพบข้อมูล ระบบจะสร้าง session emp_id สำหรับเรียกใช้งาน
            session([
                'emp_id' => $emp['emp_id'],  //รหัส
                'pfix_name' => $emp['pfix_name'],  //คำนำหน้า
                'emp_name' => $emp['emp_name'],  //ชื่อ
                'position_view' => $emp['position_view'], //ตำแหน่ง
                'div_id' => $emp['div_id'], //รหัสกอง
                'division' => $emp['division'], //ชื่อกอง
                'org_id' => $emp['org_id'],  //รหัสกลุ่ม
                'sub_division' => $emp['sub_division'] //ชื่อกลุ่ม
            ]);   

            return redirect()->route('backendindex');
        }
    }
}
