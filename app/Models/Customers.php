<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_id';
    protected $guarded = [];
    protected $table = 'customers';
}
