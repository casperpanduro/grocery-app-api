<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroceryItem extends Model
{
    use HasFactory;

    public function groceryList()
    {
        return $this->belongsTo(GroceryList::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
