<div>
    <div class="row">
        <div class="col-12">
            <div class="h5">Cart</div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-row">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Qty') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Store') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $key => $cart)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $cart->product->name }}</td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td>{{ $cart->product->price }}</td>
                                    <td>{{ $cart->product->store->name }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info"> {{ __('Edit') }} </button>
                                        <button class="btn btn-sm btn-danger"> {{ __('Delete') }} </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title h5">{{ __('Checkout Summary') }}</div>
                    <p>Total Price : {{ $this->total_price }}</p>
                    <p>Total Quantity : {{ $this->total_quantity }}</p>
                </div>
                <a href="{{ route('checkout') }}" class="btn btn-primary" >{{ __('Checkout') }}</a>
            </div>
        </div>
    </div>
</div>
