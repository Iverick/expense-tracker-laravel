<div class="field">
    <label for="title" class="label">Title</label>

    <div class="control">
        <input type="text"
               class="input @error('title') is-danger @enderror"
               name="title"
               id="title"
               value="{{ $expense->title }}"
               required>

        @error('title')
            <p class="help is-danger">{{ $errors->first('title') }}</p>
        @enderror
    </div>
</div><!-- title field -->

<div class="field">
    <label for="price" class="label">Price</label>

    <div class="control">
        <input type="number"
               step=".1"
               class="input @error('price') is-danger @enderror"
               name="price"
               id="price"
               value="{{ $expense->price }}"
               required>

        @error('price')
            <p class="help is-danger">{{ $errors->first('price') }}</p>
        @enderror
    </div>
</div><!-- price field -->

<div class="field">
    <label for="amount" class="label">Amount</label>

    <div class="control">
        <input type="number"
               class="input @error('amount') is-danger @enderror"
               name="amount"
               id="amount"
               value="{{ $expense->amount }}"
               required>

        @error('amount')
            <p class="help is-danger">{{ $errors->first('amount') }}</p>
        @enderror
    </div>
</div><!-- amount field -->

<div class="field">
    <label for="notes" class="label">Notes</label>

    <div class="control">
                    <textarea name="notes"
                              id="notes"
                              cols="30"
                              rows="2"
                              class="textarea @error('notes') is-danger @enderror">
                        {{ $expense->notes }}
                    </textarea>

        @error('notes')
        <p class="help is-danger">{{ $errors->first('notes') }}</p>
        @enderror
    </div>
</div> <!-- notes field -->

<div class="field is-grouped">
    <div class="control">
        <button class="button is-link" type="submit">Submit</button>
    </div>
</div>
