@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div>
            <h1 class="jumbotron">Welcome to the expenses page!</h1>

            <!-- Search form widget -->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <form action="{{ route('expenses.index') }}" method="GET" class="input-group">
                        <input
                            type="text"
                            id="search"
                            name="search"
                            class="form-control rounded mr-4"
                            placeholder="Look for the expense title"
                            value="{{ request()->get('search') }}"
                        />
                        <button class="btn btn-success" id="button-search" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <!-- End of search form widget -->

            <hr>

            <!-- Add Expense form widget -->
            @if(!request()->get('search'))

                <div class="flex">
                    <a class="btn btn-primary"
                       data-toggle="collapse"
                       href="#collapseCreateForm"
                       role="button"
                       aria-expanded="false"
                       aria-controls="collapseExample"
                    >
                        Click to add Expense
                    </a>
                </div>

                <div class="collapse mt-3 rounded border" id="collapseCreateForm">
                    @include('components._create_expense_form')
                </div>

                <hr>
            @endif
            <!-- End of the add Expense form widget -->

            <!-- List expenses widget -->
            <div>
                <h3 class="mt-3 mb-3">List of your expenses</h3>
                @forelse($expenses as $expense)
                    <div class="card mt-2 mb-4 rounded-3 shadow-sm {{ $expense->is_important ? 'bg-warning' : '' }}">
                        <h5 class="card-header text-center text-secondary">
                            <a href="{{ route('expenses.show', $expense) }}">
                                {{ $expense->title }}
                            </a>
                        </h5>

                        <div class="card-body">
                            <ul class="list-group list-unstyled justify-content-around">
                                <li class="list-group-item {{ $expense->is_important ? 'bg-warning' : '' }}">
                                    <h5>Price: ${{ $expense->price }}</h5>
                                </li>
                                <li class="list-group-item {{ $expense->is_important ? 'bg-warning' : '' }}">
                                    <p>Added: {{ $expense->created_at->diffForHumans() }}</p>
                                </li>
                            </ul>

                            <div class="mt-3 text-center">
                                <a href="{{ route('expenses.show', $expense) }}" class="card-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-check2-circle mr-2"
                                         viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                        <path
                                            d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                    </svg>
                                    <strong>Edit</strong>
                                </a>
                            </div>
                        </div> <!-- card-body -->
                    </div>

                @empty
                    <h5>There are no expenses stored! Click the button above to add a new one!</h5>
                @endforelse
            </div>
            <!-- End list expenses widget -->

            @if(!request()->get('search'))
                <ul class="pagination d-flex justify-content-center">
                    {{ $expenses->links() }}
                </ul>
            @endif

        </div>
    </div>
@endsection
