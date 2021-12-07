<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Http\Requests\StoreExpenseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ExpensesController extends Controller
{
    /**
     * Displays a list of expenses.
     *
     */
    public function index()
    {
        $expenses = Auth::user()->expenses()->simplePaginate(5);

        return view('expenses.index', [
            'expenses' => $expenses
        ]);
    }

    /**
     * Stores a newly Expense resource in database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreExpenseRequest $request)
    {
        $new_expense = Expense::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'price' => $request->price,
            'amount' => $request->amount,
            'notes' => $request->notes
        ]);

        if ($new_expense) {
            return redirect()->route('expenses.show', [
                'expense' => $new_expense
            ]);
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

        return view('expenses.show', [
            'expense' => $expense
        ]);
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
     * Helper method that validates field for the Expense instance passed from the request
     *
     * @return array
     */
    public function validateExpenseFields()
    {
        return request()->validate([
            'title' => 'required|string|max:55',
            'price' => 'required|numeric|between:0,999999',
            'amount' => 'required|integer|between:1,200',
            'notes' => 'nullable',
        ]);
    }
}
