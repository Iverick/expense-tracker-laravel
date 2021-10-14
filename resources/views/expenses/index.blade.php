@extends('layouts.app')

@section('content')
    <div>
        <h1>Welcome to the expenses page!</h1>

        <div class="flex">
            <a class="btn btn-primary"
               data-toggle="collapse"
               href="#collapseCreateForm"
               role="button"
               aria-expanded="false"
               aria-controls="collapseExample">
                Click to add Expense
            </a>
        </div>

        <div class="collapse" id="collapseCreateForm">
            <form method="POST" action="{{ route('expenses.store') }}">
                @csrf
                @include('_create_expense_form')
            </form>
        </div>

        <hr>

        <div>
            <h3 class="mt-2 mb-3">List of your expenses</h3>
            @forelse($expenses as $expense)
                    <div class="card mt-2 mb-4 rounded-3 shadow-sm">
                        <h5 class="card-header text-center">
                            <a href="{{ route('expenses.show', $expense) }}">
                                {{ $expense->title }}
                            </a>
                        </h5>

                        <div class="card-body">
                            <ul class="list-group list-unstyled">
                                <li class="list-group-item">
                                    <p>Price:  {{ $expense->price }}</p>
                                </li>
                                <li class="list-group-item">
                                    <p>Added:  {{ $expense->created_at->diffForHumans() }}</p>
                                </li>
                            </ul>
                        </div>

                    </div>
            @empty
                <h5>There are no expenses! Click the button above to add Expense!</h5>
            @endforelse
        </div>
    </div>
@endsection
