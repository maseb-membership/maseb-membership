<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Maseb Membership') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('vendors/admin/plugins/bs-stepper/css/bs-stepper.min.css') }}">

    <style>
        body {
            font-family: 'Nunito';
            background-image: radial-gradient(#2a2a2a, #343434, black);
            background-attachment: fixed;
        }

        .img-banner {
            width: 100%;
            max-width: 320px;
        }

        .auth-link {
            color: #dbd301;
        }

    </style>
</head>

<body>


        <div class="my-4 px-sm-0 px-md-3 px-lg-5">
            <div class="row justify-content-center px-4">
                <div class="col-sm-12 col-lg-11">
                    <div class="d-flex align-items-end">
                        <div class="flex-grow-1">
                            <img src="{{ asset('assets/image/logos/logo banner dark.png') }}"
                                class="img-banner flex-grow-1 py-2 mb-2" />

                        </div>
                    </div>


                    <div class="card shadow-sm mt-2">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="card-body p-3 h-100">
                                    <div class="d-flex flex-column bd-highlight pt-2">

                                        <div class="pl-3">
                                            <div class="mb-2">
                                                <span class="h4 font-weight-bolder text-dark">እባክዎን የሚከተሉትን
                                                    መረጃዎን በመሙላት ምዝገባዎትን ያጠናቁ!</span><br />
                                                <span class="text-muted">መረጃዎችን ሞልተው ሲጨርሱ "Submit Form"
                                                    የሚለውን ቁልፍ ይጫኑ። ያስገቡት መረጃ የተሟላ መሆኑ ሲረጋገጥ አካውንትዎ
                                                    ይከፈትልዎታል።</span>
                                            </div>
                                            <hr />
                                            <div class="row d-flex justify-content-center my-4">
                                                <div class="col-lg-8 col-sm-12">
                                                    <div class="bs-stepper">
                                                        <div class="bs-stepper-header" role="tablist">
                                                            <!-- your steps here -->
                                                            <div class="step "
                                                                data-target="#personal-info">
                                                                <button type="button" class="step-trigger"
                                                                    role="tab" aria-controls="personal-info"
                                                                    id="personal-info-trigger">
                                                                    <span class="bs-stepper-circle">1</span>
                                                                    <span class="bs-stepper-label">የግል
                                                                        መረጃ</span>
                                                                </button>
                                                            </div>
                                                            <div class="line"></div>
                                                            <div class="step"
                                                                data-target="#living-address">
                                                                <button type="button" class="step-trigger"
                                                                    role="tab"
                                                                    aria-controls="living-address"
                                                                    id="living-address-trigger">
                                                                    <span class="bs-stepper-circle">2</span>
                                                                    <span class="bs-stepper-label">የመኖሪያ
                                                                        አድራሻ</span>
                                                                </button>
                                                            </div>

                                                            <div class="line"></div>
                                                            <div class="step"
                                                                data-target="#work-address">
                                                                <button type="button" class="step-trigger"
                                                                    role="tab" aria-controls="work-address"
                                                                    id="work-address-trigger">
                                                                    <span class="bs-stepper-circle">3</span>
                                                                    <span class="bs-stepper-label">የሥራ
                                                                        አድራሻ</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="bs-stepper-content">
                                                            <!-- your steps content here -->
                                                            <div id="personal-info" class="content"
                                                                role="tabpanel"
                                                                aria-labelledby="personal-info-trigger">

                                                            </div>
                                                            <div id="living-address" class="content"
                                                                role="tabpanel"
                                                                aria-labelledby="living-address-trigger">
                                                            </div>
                                                            <div id="work-address" class="content"
                                                                role="tabpanel"
                                                                aria-labelledby="work-address-trigger">
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <form method="POST" action="">
                                                        @csrf

                                                        <div class="form-group">
                                                            <x-jet-label value="{{ __('Name') }}" />

                                                            <x-jet-input
                                                                class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                                type="text" name="name" :value="old('name')"
                                                                required autofocus autocomplete="name" />
                                                            <x-jet-input-error for="name">
                                                            </x-jet-input-error>
                                                        </div>

                                                        <div class="form-group">
                                                            <x-jet-label value="{{ __('Last Name') }}" />

                                                            <x-jet-input
                                                                class="{{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                                                                type="text" name="last_name"
                                                                :value="old('last_name')" required autofocus
                                                                autocomplete="last_name" />
                                                            <x-jet-input-error for="last_name">
                                                            </x-jet-input-error>
                                                        </div>

                                                        <div class="form-group">
                                                            <x-jet-label value="{{ __('Email') }}" />

                                                            <x-jet-input
                                                                class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                                type="email" name="email"
                                                                :value="old('email')" required />
                                                            <x-jet-input-error for="email">
                                                            </x-jet-input-error>
                                                        </div>

                                                        <div class="form-group">
                                                            <x-jet-label value="{{ __('Password') }}" />

                                                            <x-jet-input
                                                                class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                                type="password" name="password" required
                                                                autocomplete="new-password" />
                                                            <x-jet-input-error for="password">
                                                            </x-jet-input-error>
                                                        </div>

                                                        <div class="form-group">
                                                            <x-jet-label
                                                                value="{{ __('Confirm Password') }}" />

                                                            <x-jet-input class="form-control"
                                                                type="password" name="password_confirmation"
                                                                required autocomplete="new-password" />
                                                        </div>



                                                        <div class="mb-0">
                                                            <div
                                                                class="d-flex justify-content-end align-items-baseline">

                                                                <div class="button">
                                                                    <a class="btn btn-primary btn">
                                                                        {{ __('Next') }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center mb-3">
                                <a class="btn btn-secondary btn-outline btn-lg mr-3 mb-2" href="#">Submit
                                    Form</a>
                                <a class="btn btn-secondary btn-outline btn-lg mb-2"
                                    href="{{ route('logout') }}">Logout</a>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <div class="text-sm text-muted">
                            <div class="flex align-content-center">

                                <a href="https://maseb.org" class="text-light">
                                    Mahbere Sebawiyan
                                </a>
                            </div>
                        </div>

                        <div class="text-sm text-light">
                            Powered by MaSeb.org
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
<script src="{{ asset('vendors/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('vendors/admin/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>

<script>
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
</script>

</html>
