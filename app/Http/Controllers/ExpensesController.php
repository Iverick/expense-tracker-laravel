<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Http\Requests\StoreExpenseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ExpensesController extends Controller
{
    /**
     * Displays a list of expenses.
     *
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            // If URL search param was provided use helper method to search through the DB entries.
            $expenses = $this->searchExpenseItems($request);
            return view('expenses.index', compact('expenses'));
        }

        // Returns paginated list of elements
        $expenses = Auth::user()->expenses()->simplePaginate(5);
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Stores a newly Expense resource in database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreExpenseRequest $request)
    {
        $expense = Expense::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'price' => $request->price,
            'amount' => $request->amount,
            'notes' => $request->notes
        ]);

        if ($expense) {
            return redirect()->route('expenses.show', compact('expense'));
        }

        return redirect()->back();
    }

    /**
     * Displays details about the specified Expense. Allows access to the view only for the User,
     * who created this expense.
     *
     * @param \App\Expense $expense
     * @return  View template
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Expense $expense)
    {
        if ($expense->user_id !== Auth::id()) {
            return abort(403);
        }

        return view('expenses.show', compact('expense'));
    }

    /**
     * Update the specified Expense in the database.
     * Redirects back to the expense page on success.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function update(StoreExpenseRequest $request, Expense $expense)
    {
        $expense->update([
            'title' => $request->title,
            'price' => $request->price,
            'amount' => $request->amount,
            'notes' => $request->notes
        ]);

        return redirect(route('expenses.show', $expense));
    }

    /**
     * Remove the specified Expense resource from database.
     * Redirects to the expenses page on success.
     *
     * @param \App\Expense $expense
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Expense $expense)
    {
        if ($expense->user_id !== Auth::id()) {
            return abort(403);
        }

        $expense->delete();

        return redirect(route('expenses.index'));
    }

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
