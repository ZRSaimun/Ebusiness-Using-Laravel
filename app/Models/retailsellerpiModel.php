<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class retailsellerpiModel extends Model
{
    protected $table = "retailsellerpi";
    protected $primaryKey =  "retailseller_id";
    public $timestamps = false;
}
