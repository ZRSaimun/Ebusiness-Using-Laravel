<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderlist extends Model
{
    protected $table = "orderlist";
    protected $primaryKey = "order_id";
    public $timestamps = false;

    //const CREATED_AT = 'creation_date';
    //const UPDATED_AT = 'last_update';

    protected $attributes = [
        'paid' => 1, 
        'seller_revenue' => 0, 
        'company_revenue' => 0 
     ];
}
