<?php

namespace App\Models;

use Yajra\Oci8\Eloquent\OracleEloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HR_Employee extends Model
{
    protected $table = 'hr_employee';
    protected $primaryKey = 'emp_id';
    protected $fillable = ['emp_id', 'emp_name', 'english_name', 'emp_type', 'status', 'dss_phone', 'dss_fax', 'dss_mail', 'image', 'dss_location', 'show_order', 'line_token', 'status_line'];
    protected $gruaded = [];
    public $timestamps = false;


    // public function workTimes() {
    //     return $this->hasMany(HR_WorkTemp::class, 'card_id', 'tag_no');
    // }

}
