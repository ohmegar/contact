<?php

namespace App\Models;
use App\Models\CgRefCode;

use Yajra\Oci8\Eloquent\OracleEloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class P_EMP_ALL extends Model
{
    protected $table = 'CONTACT_ALL';
    protected $primaryKey = 'EMP_ID';
    // protected $fillable = ['PFIX_NAME', 'EMP_NAME', 'PFIX_NAME_E', 'ENGLISH_NAME', 'STATUS', 'POSITION_VIEW', 'DIV_ID', 'DIVISION', 'ORG_ID', 'SUB_DIVISION', 'ORG_ABBR', 'EMP_TYPE', 'EMP_TYPE_NAME', 'DSS_PHONE', 'DSS_FAX', 'DSS_MAIL', 'IMAGE', 'DSS_LOCATION', 'SHOW_ORDER', 'LINE_TOKEN', 'STATUS_LINE'];
    protected $gruaded = [];
    public $timestamps = false;


    // กำหนดการขึ้นอยู่ของข้อมูล PERIOD ไปที่ rv_low_value ของตาราง CG_REF_CODES แล้วเลือกมาเฉพาะข้อมูลที่มีค่า rv_domain เป็น "HR_PERIOD"
    public function ceoFlg()
    {
        return $this->belongsTo(CgRefCode::class, 'ceo_flg', 'rv_low_value')->where('rv_domain', 'CEO_FLG');
    }


}
