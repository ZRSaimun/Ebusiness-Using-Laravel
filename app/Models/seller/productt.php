<?php

namespace App\Models\seller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productt extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $primaryKey = "product_id ";
    public $timestamp = false;
}