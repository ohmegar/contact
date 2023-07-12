<?php

namespace App\Models;

use Yajra\Oci8\Eloquent\OracleEloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class P_EMP_ALL extends Model
{
    protected $table = 'P_EMP_ALL';
    protected $primaryKey = 'EMP_ID';
    protected $fillable = ['PFIX_NAME', 'EMP_NAME', 'PFIX_NAME_E', 'ENGLISH_NAME', 'STATUS', 'POSITION_VIEW', 'DIV_ID', 'DIVISION', 'ORG_ID', 'SUB_DIVISION', 'ORG_ABBR', 'EMP_TYPE', 'EMP_TYPE_NAME', 'DSS_PHONE', 'DSS_FAX', 'DSS_MAIL', 'IMAGE', 'DSS_LOCATION', 'SHOW_ORDER', 'LINE_TOKEN', 'STATUS_LINE'];
    protected $gruaded = [];
    public $timestamps = false;


    // public function workTimes() {
    //     return $this->hasMany(HR_WorkTemp::class, 'card_id', 'tag_no');
    // }

}
