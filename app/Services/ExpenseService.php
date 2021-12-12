<?php

namespace App\Services;

use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ExpenseService {

    /**
     * Helper method filters the Expense entries based on the search URL parameter.
     *
     * @param Request $request
     * @return Expense[]|\Illuminate\Database\Eloquent\Collection
     */
    public function searchExpenseItems(Request $request)
    {
        $query = strtolower($request->get('search'));
        $expenses = Auth::user()->expenses;
        $expenses = $expenses->filter(function ($expense) use ($query) {
            if (Str::contains(strtolower($expense->title), $query)) {
                return true;
            }

            if (Str::contains(strtolower($expense->notes), $query)) {
                return true;
            }

            return false;
        });

        return $expenses;
    }
}
