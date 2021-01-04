<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerpiModel extends Model
{
    protected $table = "customerpi";
    protected $primaryKey = "customer_id";
    public $timestamp = false;
}
