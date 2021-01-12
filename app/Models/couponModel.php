<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class couponModel extends Model
{
    use HasFactory;
    protected $table = "coupon";
    protected $primaryKey = "coupon_id ";
    public $timestamp = false;
}