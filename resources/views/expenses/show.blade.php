@extends('layouts.app')

@section('content')
    <p>{{ current_user()->name }}</p>
    <p>{{ $expense->title }}</p>
    <p>{{ $expense->price }}</p>
    <p>{{ $expense->amount }}</p>
    @empty($expense->notes)
    @else
        <p>{{ $expense->notes }}</p>
    @endempty
    <p>{{ $expense->created_at }}</p>

    <form method="POST" action="{{ route('expenses.update', $expense->title) }}">
        @csrf
        @method('PUT')

        @include('_update_expense_form')
    </form>
@endsection


