@extends('layouts.website.index')

@section('title', 'User Account')

@section('styles')
    @livewireStyles
@endsection

@section('navbar')
    @include('website.navbar')
@endsection

@section('content')
    <div class="container mb-4">
        <div class="row mt-4">
            <div class="col">
                <h2 class="mb-4">{{ __('Edit Profile') }}</h2>
            </div>
        </div>
        <div class="grid-container">
            <div class="justify-content-center ">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                        @livewire('profile.update-profile-information-form')
                                        <div class="alert alert-warning" role="alert">
                                            Sorry, You are not permitted to Edit your profile.
                                        </div>
                                    <x-jet-section-border />
                                @endif

                                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                    @livewire('profile.update-password-form')

                                    <x-jet-section-border />
                                @endif

                                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                    @livewire('profile.two-factor-authentication-form')

                                    <x-jet-section-border />
                                @endif

                                @livewire('profile.logout-other-browser-sessions-form')

                                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                    <x-jet-section-border />

                                    @livewire('profile.delete-user-form')
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    @livewireScripts
@endsection
