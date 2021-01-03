<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sellerModel extends Model
{
    use HasFactory;
    protected $table = "sellerpi";
    protected $primaryKey = "seller_id ";
    public $timestamp = false;
}