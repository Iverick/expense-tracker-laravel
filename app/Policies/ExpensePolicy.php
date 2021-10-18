<?php

namespace App\Policies;

use App\Expense;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpensePolicy
{
    /**
     * Verifies that authorized user and a user, who created an Expense, is the same User.
     *
     * @return Bool
     */
    public function show(User $user, Expense $expense)
    {
        return $user->id === $expense->user_id;
    }
}
