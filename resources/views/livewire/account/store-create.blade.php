<div>
    <form wire:submit.prevent="create" >
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">{{ __('Name') }}</label>
            <div class="col-sm-10">
                <input type="text"  wire:model="name" id="name"  class="form-control" placeholder="{{ __('Store') . ' ' . __('Name') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="caption" class="col-sm-2 col-form-label">{{ __('Caption') }}</label>
            <div class="col-sm-10">
                <textarea wire:model="caption" id="caption" class="form-control" cols="30" rows="5"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">{{ __('Address') }}</label>
            <div class="col-sm-10">
                <textarea wire:model="address" id="address" class="form-control" cols="30" rows="5"></textarea>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
</div>