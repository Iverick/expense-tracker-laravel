<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @method static whereIn(string $string, mixed $thisUserId)
 * @method static latest()
 * @method static where(string $string, mixed $thisUserId)
 * @method static create(array $array)
 * @method static filter(\Closure $param)
 */
class Expense extends Model
{
    protected $guarded = [];

    /**
     * Declare Many-To-One relationship to the User model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
