<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Progreso extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'progreso';

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'dialogo_id',
        'capitulo_id'
    ];

    /**
     * Get the user that has the progress.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
