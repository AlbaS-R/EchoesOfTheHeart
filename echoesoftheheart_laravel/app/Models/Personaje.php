<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Personaje extends Model
{
    /**
     * The users that have relations with the character.
     */
    public function jugador(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'relaciones')->withPivot('lovemeter');
    }
}
