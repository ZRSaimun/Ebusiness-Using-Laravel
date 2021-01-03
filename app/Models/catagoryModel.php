<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catagoryModel extends Model
{
    use HasFactory;
    protected $table = "catagory";
    protected $primaryKey = "catagory_id ";
    public $timestamp = false;
}