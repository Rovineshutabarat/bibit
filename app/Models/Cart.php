<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;


    protected $table = "cart";

    protected $fillable = [
        "user_id"
    ];

    public function products()
    {
        return $this->hasMany(Cart::class)
            ->withPivot("quantity")
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
