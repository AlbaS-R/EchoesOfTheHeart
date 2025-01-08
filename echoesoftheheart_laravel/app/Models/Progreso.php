<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Progreso extends Model
{
    /**
     * Get the user that has the progress.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
