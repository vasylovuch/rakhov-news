<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sellit extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'category',
        'phone',
        'location',
        'user_id',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'sellit_id', 'id');
    }
}