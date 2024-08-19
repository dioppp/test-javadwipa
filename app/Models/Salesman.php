<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    use HasFactory;

    protected $primaryKey = 'salesman_id';
    protected $guarded = [];
    protected $table = 'salesman';
}
