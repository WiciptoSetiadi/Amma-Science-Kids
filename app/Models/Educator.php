<?php

namespace App\Models;

use Database\Factories\EducatorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educator extends Model
{
    /** @use HasFactory<EducatorFactory> */
    use HasFactory;
}
