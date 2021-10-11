@extends('layouts.app')

@section('content')
    <div>
        <h1>Welcome to the expenses page!</h1>

        <hr>
        <div>See your expenses!
            <p>{{ current_user() }}</p>
            @foreach($expenses as $expense)
                <div class="flex justify-content-center">
                    <p>{{ $expense->title }}</p>
                    <p>{{ $expense->created_at }}</p>
                    <p>{{ $expense->user->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
