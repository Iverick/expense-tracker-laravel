<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @method static whereIn(string $string, mixed $thisUserId)
 * @method static latest()
 * @method static where(string $string, mixed $thisUserId)
 */
class Expense extends Model
{
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
