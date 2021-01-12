<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reportModel extends Model
{
    protected $table = "report";
    protected $primaryKey =  "report_id";
    public $timestamps = false;
}
