<?php

namespace App\Models\seller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userr extends Model
{
    use HasFactory;
    protected $table ="user";
    protected $primaryKey = "user_id ";
    public $timestamp= false;
}
