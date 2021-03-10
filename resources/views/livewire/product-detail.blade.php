<div>
    <div class="row">
        <div class="col-8">    
            <div class="row">
                <div class="col-12">
                    <div class="col-12 bg-secondary my-2" style="height: 300px"></div>
                    <hr>
                    <p>{{ $product->description }}</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <h1>{{ $product->name }}</h1>
                    <h2>Rp. {{ $product->price }}</h2>
                    <hr>
                    <span>{{ __('Category') }} : {{ $product->category->name }}</span> <br>
                    <span>{{ __('Store') }} : {{ $product->store->name }}</span>
                    <hr>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend" id="button-addon3">
                            <button wire:click="incrementQty"  class="btn btn-outline-secondary" type="button">-</button>
                        </div>
                        <input type="text" class="form-control text-center" placeholder="" wire:model="quantity">
                        <div class="input-group-append" id="button-addon3">
                            <button wire:click="decrementQty" class="btn btn-outline-secondary" type="button">+</button>
                        </div>
                    </div>
                    <div class="btn-group btn-block">
                        <button  class="btn btn-info text-white" wire:click="addCart"> {{ __('Add to cart') }}</button>
                        <button class="btn btn-primary" wire:click="checkoutNow"> {{ __('Checkout now') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
