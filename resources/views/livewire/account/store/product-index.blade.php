<div>
    <div class="card">
        <div class="card-header">
            <span class="card-title">{{ __('Product') }}</span>
        </div>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <button data-toggle="modal" data-target="#productModal"  wire:click="add" class="btn btn-primary">{{ __('Add') }}</button>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Category') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Price') }}</th>
                        <th>{{ __('Stock') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $product->name}}</td>
                            <td>{{ $product->category->name}}</td>
                            <td>{{ $product->description}}</td>
                            <td>{{ $product->price}}</td>
                            <td>{{ $product->stock}}</td>
                            <td>
                                <button class="btn btn-warning">{{ __('Edit') }}</button>
                                <button class="btn btn-danger">{{ __('Delete') }}</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="createProduct" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Create Product') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ( $formAction )
                        <livewire:account.store.product-form :action="$formAction" />
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
window.livewire.on('productCreated', (store) => {
    $('#productModal').modal('hide');
})
</script>