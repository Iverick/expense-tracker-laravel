<form method="POST" action="{{ route('expenses.update', $expense->id) }}">
    @csrf
    @method('PUT')

    <div class="field mt-3">
        <label for="title" class="form-label">Title</label>

        <div class="control">
            <input
                type="text"
                class="form-control @error('title') is-invalid @enderror"
                name="title"
                id="title"
                value="{{ $expense->title }}"
                required
            >

            @error('title')
            <p class="help invalid-feedback">{{ $errors->first('title') }}</p>
            @enderror
        </div>
    </div><!-- title field -->

    <div class="field mt-2">
        <label for="price" class="form-label">Price</label>

        <div class="control">
            <input
                type="number"
                step=".1"
                class="form-control @error('price') is-invalid @enderror"
                name="price"
                id="price"
                value="{{ $expense->price }}"
                required
            >

            @error('price')
            <p class="help invalid-feedback">{{ $errors->first('price') }}</p>
            @enderror
        </div>
    </div><!-- price field -->

    <div class="field mt-2">
        <label for="amount" class="form-label">Amount</label>

        <div class="control">
            <input
                type="number"
                class="form-control @error('amount') is-invalid @enderror"
                name="amount"
                id="amount"
                value="{{ $expense->amount }}"
                required
            >

            @error('amount')
            <p class="help invalid-feedback">{{ $errors->first('amount') }}</p>
            @enderror
        </div>
    </div><!-- amount field -->

    <div class="field mt-2">
        <label for="notes" class="form-label">Notes</label>

        <div class="control">
        <textarea
            name="notes"
            id="notes"
            rows="3"
            class="form-control @error('notes') is-invalid @enderror"
        >
            {{ $expense->notes }}
        </textarea>

            @error('notes')
            <p class="help invalid-feedback">{{ $errors->first('notes') }}</p>
            @enderror
        </div>
    </div> <!-- notes field -->

    <div class="form-group row mt-3">
        <div class="form-check form-check-inline">
            <input type="hidden" name="is_important" value="0">
            <input
                class="form-check-input ml-3 mr-1"
                type="checkbox"
                id="is_important"
                name="is_important"
                value="1" {{ $expense->is_important ? 'checked' : '' }}
            >
            <label for="is_important" class="form-check-label">Is Important</label>
        </div>
    </div>

    <div class="field is-grouped justify-content-center d-flex">
        <div class="control mt-3">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>
</form>
