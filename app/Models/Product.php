<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    /**
     * using HasFactory trait to seed faker data
     */
    use HasFactory;

    protected $guarded = [
        "id",
    ];
}
