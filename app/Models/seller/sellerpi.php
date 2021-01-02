<?php

namespace App\Models\seller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sellerpi extends Model
{
    use HasFactory;
    protected $table = "sellerpi";
    protected $primaryKey = "seller_id ";
    public $timestamp = false;
}