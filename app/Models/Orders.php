<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $casts = [
        'order_amount' => 'float',
        // 'delivery_address_id' => 'integer',
        'delivery_man_id' => 'integer',
        // 'delivery_charge' => 'float',
        'user_id' => 'integer',
        'payment_status' => 'varchar',
        'order_status' => 'varchar',
        'payment_method' => 'varchar',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function delivery_man()
    {
        return $this->belongsTo(DeliveryMan::class, 'delivery_man_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }

}
