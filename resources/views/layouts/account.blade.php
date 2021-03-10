@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-2">
            <div class="card mb-4">
                <div class="card-header">
                    <span class="card-title">{{ __('Account') }}</span>
                </div>
                <div class="list-group">
                    <a class="list-group-item list-group-item-action {{ set_active('account.profile') }}" id="profile" href="{{ route('account.profile') }}" >{{ __('Profile') }}</a>
                    <a class="list-group-item list-group-item-action {{ set_active('account.address') }}" id="address" href="{{ route('account.address') }}" >{{ __('Address') }}</a>
                    <a class="list-group-item list-group-item-action {{ set_active('account.change_password') }}" id="change_password" href="{{ route('account.change_password') }}" >{{ __('Change Password') }}</a>
                    <a class="list-group-item list-group-item-action {{ set_active(['account.transaction']) }}" href="{{ route('account.transaction') }}">{{ __('Transaction') }}</a>
                </div>
            </div>

            <livewire:account.store-nav></livewire:account.store-nav>
        </div>
        <div class="col-10">
            {{ $slot }}
        </div>
    </div>

@endsection