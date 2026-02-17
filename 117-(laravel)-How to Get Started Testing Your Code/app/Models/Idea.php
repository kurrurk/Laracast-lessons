<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Idea extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'state' => 'in Arbeit'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
