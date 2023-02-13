<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'prod_name',
        'image',
        'stock',
        'category_id',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
