@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-7 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h4 class="card-title text-center">{{ $expense->title }}</h4>
                    <hr>

                    <div class="row mt-2">
                        <div class="col-5">
                            <p>Created by:</p>
                        </div>
                        <div class="col-7">
                            <p class="text-center">{{ current_user()->name }}</p>
                        </div>
                    </div>
                    <hr>

                    <div class="row mt-2">
                        <div class="col-5">
                            <p>Item Price:</p>
                        </div>
                        <div class="col-7">
                            <p class="text-center">{{ $expense->price }}</p>
                        </div>
                    </div>
                    <hr>

                    <div class="row mt-2">
                        <div class="col-5">
                            <p>Amount:</p>
                        </div>
                        <div class="col-7">
                            <p class="text-center">{{ $expense->amount }}</p>
                        </div>
                    </div>
                    <hr>

                    @empty($expense->notes)
                    @else
                        <p class="fs-4 text-muted">
                            {{ $expense->notes }}
                        </p>
                        <hr>
                    @endempty


                    <div class="row mt-2">
                        <div class="col-5">
                            <p>Bought on:</p>
                        </div>
                        <div class="col-7">
                            <p class="text-center">{{ $expense->created_at->format('Y-m-d') }}</p>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <a class="btn btn-outline-primary" href="{{ route('expenses.index') }}">Go Back</a>
                    <form method="POST" action="{{ route('expenses.destroy', $expense->id) }}">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger">Delete expense</button>
                    </form>
                </div>
            </div>
        </div> <!-- div col-7 -->

        <div class="col-5">
            <h3 class="mt-3 text-center">Edit this expense</h3>
            <form method="POST" action="{{ route('expenses.update', $expense->id) }}">
                @csrf
                @method('PUT')

                @include('_update_expense_form')
            </form>
        </div>
    </div>
@endsection


