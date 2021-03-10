<div>
        <div class="row">
        @foreach ($products as $product)    
            <div class="col-3">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">Rp. {{ $product->price }}</p>
                </div>
                <a href="{{ route('product', $product->slug) }}" class="btn btn-sm btn-block btn-primary">{{ __('Detail') }}</a>
            </div>
            </div>
        @endforeach
    
</div></div>
