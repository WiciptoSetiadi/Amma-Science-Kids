<?php

namespace App\Models;

use Database\Factories\EducatorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educator extends Model
{
    /** @use HasFactory<EducatorFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'bio',
        'image',
        'accent_color',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }
}
