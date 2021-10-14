<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
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
     * Used to display details about the specified Expense.
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
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
