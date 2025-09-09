<?php

namespace App\Models;

use Yajra\Oci8\Eloquent\OracleEloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class CgRefCode extends Model
{
    use HasFactory;

    protected $table = 'cg_ref_codes';

    // protected $primaryKey = '';

    protected $connection = 'oracle';

    // protected $fillable = [];

    protected $guarded = [];

    public $timestamps = false;

    // public $sequence = '';
}
