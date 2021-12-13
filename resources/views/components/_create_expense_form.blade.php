<form method="POST" action="{{ route('expenses.store') }}">
    @csrf

    <div class="bg-white p-3">
        <div class="field mt-3">
            <label for="title" class="form-label">Title</label>

            <div class="control">
                <input
                    type="text"
                    class="form-control @error('title') is-danger @enderror"
                    name="title"
                    id="title"
                    value="{{ old('title') }}"
                    required
                >

                @error('title')
                <p class="help is-danger">{{ $errors->first('title') }}</p>
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
                    value="{{ old('price') }}"
                    required
                >

                @error('price')
                <div class="help invalid-feedback">{{ $errors->first('price') }}</div>
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
                    value="{{ old('amount') }}"
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
                {{ old('notes') }}
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
                    value="1"
                >
                <label for="is_important" class="form-check-label">Important</label>
            </div>
        </div> <!-- is_important checkbox -->

        <div class="field is-grouped justify-content-center d-flex">
            <div class="control mt-3">
                <button class="btn btn-success btn-lg btn-block" type="submit">Submit</button>
            </div>
        </div>
    </div>
</form>
