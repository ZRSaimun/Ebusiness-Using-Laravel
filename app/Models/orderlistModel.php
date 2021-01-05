<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderlistModel extends Model
{
    protected $table = "orderlist";
    protected $primaryKey =  "order_id";
    public $timestamps = false;
}
