<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sellerpiModel extends Model
{
    protected $table = "sellerpi";
    protected $primaryKey =  "seller_id";
    public $timestamps = false;
}
