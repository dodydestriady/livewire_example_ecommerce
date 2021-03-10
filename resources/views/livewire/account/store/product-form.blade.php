<div>
    <form wire:submit.prevent="create">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">{{ __('Name') }}</label>
            <div class="col-sm-10">
                <input type="text" wire:model="name" placeholder="{{ __('Name') }}" id="name" class="form-control @error('name') is-invalid @enderror">
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">{{ __('Category') }}</label>
            <div class="col-sm-10">
                <select wire:model="category" id="category" class="form-control @error('category') is-invalid @enderror">
                    <option> {{ __('Select Category') }}</option>

                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">{{ __('Price') }}</label>
            <div class="col-sm-10">
                <input type="text" wire:model="price" placeholder="{{ __('Price') }}" id="name" class="form-control @error('price') is-invalid @enderror">
            </div>
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group row">
            <label for="stock" class="col-sm-2 col-form-label">{{ __('Stock') }}</label>
            <div class="col-sm-10">
                <input type="text" wire:model="stock" placeholder="{{ __('Stock') }}" id="stock" class="form-control @error('stock') is-invalid @enderror">
            </div>
            @error('stock')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">{{ __('Description') }}</label>
            <div class="col-sm-10">
                <textarea wire:model="description" id="description" class="form-control @error('description') is-invalid @enderror"> </textarea>
            </div>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <hr>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
</div>