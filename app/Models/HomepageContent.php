<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomepageContent extends Model
{
    protected $fillable = [
        'featured_article_id',
        'featured_program_one_id',
        'featured_program_two_id',
        'is_configured',
    ];

    protected function casts(): array
    {
        return [
            'is_configured' => 'boolean',
        ];
    }

    public function featuredArticle(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'featured_article_id');
    }

    public function featuredProgramOne(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'featured_program_one_id');
    }

    public function featuredProgramTwo(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'featured_program_two_id');
    }
}
