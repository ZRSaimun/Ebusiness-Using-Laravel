<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    protected $table = "user";
    protected $primaryKey =  "user_id";
    public $timestamps = false;
}
