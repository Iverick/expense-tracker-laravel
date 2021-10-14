@extends('layouts.app')

@section('content')
    <div>
        <h1>Welcome to the expenses page!</h1>

        <form method="POST" action="{{ route('expenses.store') }}">
            @csrf

            @include('_create_expense_form')
        </form>

        <hr>
        <div>See your expenses!
            <p>{{ current_user() }}</p>
            @foreach($expenses as $expense)
                <div class="flex justify-content-center">
                    <a href="{{ route('expenses.show', $expense) }}">
                        {{ $expense->title }}
                    </a>
                    <p>{{ $expense->price }}</p>
                    <p>{{ $expense->created_at->diffForHumans() }}</p>
                    <p>{{ $expense->user->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
