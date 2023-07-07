<?php

namespace App\Models;

// use App\Models\HR_WorkTemp;
use Yajra\Oci8\Eloquent\OracleEloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HR_Employee extends Model
{
    protected $table = 'HR_EMPLOYEE';
    protected $primaryKey = 'EMP_ID';
    protected $fillable = ['EMP_NAME', 'ENGLISH_NAME', 'EMP_TYPE', 'STATUS', 'DSS_PHONE', 'DSS_FAX', 'DSS_MAIL', 'IMAGE', 'DSS_LOCATION', 'SHOW_ORDER', 'LINE_TOKEN', 'STATUS_LINE'];
    protected $gruaded = [];
    public $timestamps = false;


    // public function workTimes() {
    //     return $this->hasMany(HR_WorkTemp::class, 'card_id', 'tag_no');
    // }

}
