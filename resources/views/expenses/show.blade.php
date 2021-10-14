@extends('layouts.app')

@section('content')
    <div class="flex justify-content-center">
        <p>{{ current_user()->name }}</p>
        <p>{{ $expense->title }}</p>
        <p>{{ $expense->price }}</p>
        <p>{{ $expense->amount }}</p>
        @empty($expense->notes)
        @else
            <p>{{ $expense->notes }}</p>
        @endempty
        <p>{{ $expense->updated_at->format('Y-m-d') }}</p>
    </div>

    <form method="POST" action="{{ route('expenses.destroy', $expense->title) }}">
        @csrf
        @method('DELETE')

        <button class="btn btn-danger">Delete expense</button>
    </form>

    <form method="POST" action="{{ route('expenses.update', $expense->title) }}">
        @csrf
        @method('PUT')

        @include('_update_expense_form')
    </form>
@endsection


