<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sellit_id', 
        'items',
        'name',
        'phone',
        'address',
        'comment',
    ];

    public function sellit()
    {
        return $this->belongsTo(Sellit::class, 'sellit_id', 'id');
    }
}
