<div>
    @section('head')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Simple Ecommerce</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>
    @endsection
    <div class="row">
        <div class="col-2">
            <strong>{{ __('Filter') }}</strong>
            <hr>
            <livewire:product-filter />
        </div>
        
        <div class="col-10">
            <div class="row">
                <div class="col-12">
                    <div class="input-group mb-3">
                        <input type="text" name="" id="" class="form-control" placeholder="{{ __('Search product name') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">{{ __('Search') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <livewire:product-index />
                </div>
            </div>
        </div>
    </div>
</div>
