<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eventModel extends Model
{
    protected $table = "event";
    protected $primaryKey =  "event_id";
    public $timestamps = false;
}
