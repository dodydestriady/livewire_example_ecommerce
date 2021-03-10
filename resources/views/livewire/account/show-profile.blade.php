<div>
    <div class="card">
        <div class="card-header">
            <span class="card-title">Profile</span>
        </div>
        <div class="card-body">
            <form action="" >
                {{ method_field('PUT') }}
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                    <div class="col-sm-10">
                        <input type="text"  wire:model="data.name" id="name" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $data->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                    <div class="col-sm-3">
                        <input type="text" wire:model="data.phone" id="phone" value="{{ $data->phone }}" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="created_at" class="col-sm-2 col-form-label">{{ __('Created At') }}</label>
                    <div class="col-sm-3">
                        <input type="datetime" id="created_at" value="{{ $data->created_at }}" class="form-control-plaintext" readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
            </form>
        </div>
    </div>
</div>
