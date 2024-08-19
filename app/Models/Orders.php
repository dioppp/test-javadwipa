<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'order_id';
    protected $table = 'orders';

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'customer_id');
    }

    public function salesman()
    {
        return $this->belongsTo(Salesman::class, 'salesman_id', 'salesman_id');
    }
}
