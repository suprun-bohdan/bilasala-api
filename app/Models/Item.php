<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(mixed $validated)
 * @method static findOrFail($id)
 */
class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'type', 'make', 'model', 'year', 'mileage', 'color', 'price', 'description', 'photos'
    ];

    protected $casts = [
        'photos' => 'array',
    ];
}
