<div>
    <div class="row">
        <div class="col-12">
            <div class="h5">Checkout</div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="destination" class="col col-form-label">{{ __('Select destination') }}</label>
                        <div class="col-12">
                            <select wire:model="destination" id="" class="form-control" >
                                @foreach($addresses as $address)
                                    <option value="{{ $address->address }}"> {{ $address->name }} - {{ $address->address }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @foreach ($stores as $store => $carts)
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="table-active">
                                <th colspan="4">{{ $carts['name'] }}</th>
                            </tr>
                            <tr class="table-primary">
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Qty') }}</th>
                                <th>{{ __('Price') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts['cart'] as $key => $cart)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $cart->product->name }}</td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td>{{ $cart->product->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title h5">{{ __('Total') }}</div>
                    <div class="d-flex justify-content-between"> <span>Quantity</span> <span> {{ $this->total_quantity }}</span></div>
                    <div class="d-flex justify-content-between"> <span>Price</span> <span> {{ $this->total_quantity }}</span></div>
                    <div class="d-flex justify-content-between"> <span>Shipping</span> <span> {{ $this->total_shipping }}</span></div>
                    <hr>
                    <div class="d-flex justify-content-between"> <strong>Grand Total</strong> <strong> {{ $this->grand_total }}</strong></div>
                    
                </div>
                <button wire:click="create" onclick="confirm('Process checkout ?') || event.stopImmediatePropagation()" class="btn btn-primary" >{{ __('Checkout') }}</button>
            </div>
        </div>
    </div>
</div>
