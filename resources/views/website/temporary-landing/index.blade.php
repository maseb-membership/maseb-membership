<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Maseb Membership') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('vendors/admin/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('vendors/admin/plugins/bs-stepper/css/bs-stepper.min.css') }}">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('vendors/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">


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

    @livewireStyles

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
                                                        <div class="step"
                                                            data-target="#personal-details-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="personal-details-part"
                                                                id="personal-details-part-trigger">
                                                                <span class="bs-stepper-circle">1</span>
                                                                <span class="bs-stepper-label">Personal Details</span>
                                                            </button>
                                                        </div>
                                                        <div class="line"></div>
                                                        <div class="step" data-target="#address-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="address-part" id="address-part-trigger">
                                                                <span class="bs-stepper-circle">2</span>
                                                                <span class="bs-stepper-label">Address</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="bs-stepper-content">
                                                        <!-- your steps content here -->
                                                        <div id="personal-details-part" class="content" role="tabpanel"
                                                            aria-labelledby="personal-details-part-trigger">
                                                            <div>
                                                                <h4>{{ __('Thank you for registering here is your personal detail') }}...</h4>
                                                                @if (session()->has('message'))
                                                                    <div class="alert alert-success">
                                                                        {{ session('message') }}
                                                                    </div>
                                                                @endif

                                                                <livewire:user.personaldetail />

                                                            </div>
                                                            <div id="address-part" class="content"
                                                                role="tabpanel" aria-labelledby="address-part-trigger">


                                                                @include('website.temporary-landing.address-form')


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col col-12">
                                                    <button class="btn btn-primary" id="prev">Previous</button>
                                                    <button class="btn btn-primary" id="next">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            @auth

                                @if (auth()->user()->hasRole('finance-admin') ||
                    auth()->user()->hasRole('super-admin') ||
                    auth()->user()->hasRole('membership-admin') ||
                    auth()->user()->hasRole('system-manager'))
                                    <div class="row">
                                        <div class="mx-auto col-12">
                                            <a href="{{ route('admin.home') }}">System Administration</a>
                                        </div>
                                    </div>
                                @endif
                            @endauth
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
                <center>
                <a class="text-center  pull-right pt-2"
                href="{{ route('logout') }}">Logout</a>
                </center>
            </div>
        </div>
        @include('website.temporary-landing.personalDetailEditModal')
</body>

@livewireScripts

<script type="text/javascript">
    window.livewire.on('userStore', () => {
        $('#personalDetailsEditModal').modal('hide');
    });
</script>




<!-- jQuery -->
<script src="{{ asset('vendors/admin/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('vendors/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- BS-Stepper -->
<script src="{{ asset('vendors/admin/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>

<script src="{{ asset('vendors/admin/plugins/moment/moment.min.js') }}"></script>

<!-- Bootstrap Date Range Picker -->
<script src="{{ asset('vendors/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('vendors/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>

<script>
    // BS-Stepper Init


    $(document).ready(function() {
        var stepper = new Stepper($('.bs-stepper')[0])
        var stepperEl = $('.bs-stepper')[0];

        $('#prev').hide();

        stepperEl.addEventListener('shown.bs-stepper', function(event) {
            let stepno = event.detail.indexStep;
            if (stepno != 0) {
                $('#prev').show();
            } else {
                $('#prev').hide();
            }
        });

        $('#next').on('click', function() {
            stepper.next();
        });

        $('#prev').on('click', function() {
            stepper.previous();
        });

        $('#birth_date').datetimepicker({
            format: 'L',
            viewMode: 'years'
        });
    });
</script>

</html>
