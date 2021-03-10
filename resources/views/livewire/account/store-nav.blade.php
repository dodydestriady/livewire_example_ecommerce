<div>
    @if($store)
    <div class="card mb-4">
        <div class="card-header">
            <span class="card-title">{{ __('Store') }}</span>
        </div>
        <div class="list-group">
            <a class="list-group-item list-group-item-action {{ set_active(['account.store.profile']) }}" id="profile" href="{{ route('account.store.profile') }}" >{{ __('Profile') }}</a>
            <a class="list-group-item list-group-item-action {{ set_active(['account.store.transaction']) }}" id="transaction" href="{{ route('account.store.transaction') }}" >{{ __('Transaction') }}</a>
            <a class="list-group-item list-group-item-action {{ set_active(['account.store.product']) }}" id="product" href="{{ route('account.store.product') }}" >{{ __('Product') }}</a>
        </div>
    </div>                    
    @else 
    <div class="card">
        <div class="card-body">
            <p class="text-center">{{ __('message.become_a_seller') }}</p>
            <button data-toggle="modal" data-target="#createStore" class="btn btn-success btn-block"> {{ __('Open Store') }} </button>
        </div>
    </div>

    <div class="modal fade" id="createStore" tabindex="-1" role="dialog" aria-labelledby="createStoreTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Create Store') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <livewire:account.store-create></livewire:account.store-create>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if (session()->has('message'))
        <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
            <div class="toast" style="position: absolute; top: 0; right: 0;">
                <div class="toast-header">
                <strong class="mr-auto">{{ __('Store') }}</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="toast-body">
                {{ session('message') }}
                </div>
            </div>
        </div>
    @endif
    
</div>

<script>
window.livewire.on('storeCreated', (store) => {
    $('#createStore').removeClass('fade').modal('hide');
    $('#createStore').modal('dispose');
 })
</script>