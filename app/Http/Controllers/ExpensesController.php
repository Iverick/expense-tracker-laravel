<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Displays a list of expenses.
     *
     */
    public function index()
    {
        $expenses = current_user()->expenses;

        return view('expenses.index', [
            'expenses' => $expenses
        ]);
    }

    /**
     * Stores a newly Expense resource in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $user_id = auth()->id();
        $validAttributes = request()->validate([
            'title' => 'required|string|unique:expenses,title|max:55',
            'price' => 'required|numeric|between:0,999999',
            'amount' => 'required|integer|between:1,200',
            'notes' => 'nullable',
        ]);
        $validAttributes['user_id'] = $user_id;

        Expense::create($validAttributes);

        return redirect()->route('expenses.index');
    }

    /**
     * Displays details about the specified Expense.
     *
     * @param  \App\Expense  $expense
     * @return  View template
     */
    public function show(Expense $expense)
    {
        return view('expenses.show', [
           'expense' =>  $expense
        ]);
    }

    /**
     * Update the specified Expense in the database.
     * Redirects back to the expense page on success.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Expense $expense)
    {
        $validated_attributes = request()->validate([
            'title' => 'required|string|max:55',
            'price' => 'required|numeric|between:0,999999',
            'amount' => 'required|integer|between:1,200',
            'notes' => 'nullable',
        ]);

        $expense->update($validated_attributes);

        return redirect(route('expenses.show', $expense->title));
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
        $expense->delete();

        return redirect(route('expenses.index'));
    }
}
