<div>
    <div class="row">
        <div class="col-12">
            {{ __('Category') }}
            <ul class="list-unstyled">
                @foreach ($categories as $category)
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $category->id }}" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            {{ $category->name }}
                        </label>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            {{ __('Sort By Price') }}
        </div>
    </div>
    <div class="row">
        <div class="col-12">
    <select name="" id="" class="form-control">
        <option value=""> {{ __('Price High to Low') }} </option>
        <option value=""> {{ __('Price Low to High') }} </option>
    </select>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            {{ __('Sort By Name') }}
        </div>
    </div>
    <div class="row">
        <div class="col-12">
    <select name="" id="" class="form-control">
        <option value=""> {{ __('Name A to Z') }} </option>
        <option value=""> {{ __('Name Z to A') }} </option>
    </select>
        </div>
    </div>
</div>
