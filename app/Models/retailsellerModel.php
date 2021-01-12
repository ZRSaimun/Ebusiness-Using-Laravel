<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class retailsellerModel extends Model
{
    use HasFactory;
    protected $table = "retailsellerpi";
    protected $primaryKey = "retailseller_id ";
    public $timestamp = false;
}