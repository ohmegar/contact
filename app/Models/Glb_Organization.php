<?php

namespace App\Models;

use Yajra\Oci8\Eloquent\OracleEloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Glb_Organization extends Model
{
    protected $table = 'glb_organization';
    protected $primaryKey = 'org_id';
    protected $fillable = ['org_code', 'org_name', 'org_abbr', 'org_org_id'];

    protected $gruaded = [];

    public $timestamps = false;
}
