<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminpiModel extends Model
{
    protected $table = "adminpi";
    protected $primaryKey =  "admin_id";
    public $timestamps = false;
}
