<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroceryList extends Model
{
    use HasFactory;

    protected $with = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
