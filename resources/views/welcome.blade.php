<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
<body class="">


    <div class="my-4 px-sm-0 px-md-3 px-lg-5">
        <div class="row justify-content-center px-4">
            <div class="col-sm-12 col-lg-11">
                <div class="d-flex align-items-end">
                    <div class="flex-grow-1">
                        <img src="{{ asset('assets/image/logos/logo banner dark.png') }}" class="img-banner flex-grow-1 py-2 mb-2"/>

                    </div>
                    {{-- <div class="p-2">
                        <a class="btn btn-secondary">Login</a>
                        <a class="btn btn-secondary">Login</a>

                    </div> --}}
                </div>
                {{-- <div class="d-flex justify-content-end">
                    @if (Route::has('login'))
                        <div class="">
                            @auth
                                <a style="color: #dbd301; font-size: 1rem; padding: 2px 6px; border: 1px solid gray; border-radius: 3px; background-color:dark;" href="{{ url('/dashboard') }}" class="auth-links ">Dashboard</a>
                            @else
                                <a style="color: #dbd301; font-size: 1rem; padding: 2px 6px; border: 1px solid gray; border-radius: 3px; background-color:dark;" href="{{ route('login') }}" class="auth-links ">Log in</a>

                                @if (Route::has('register'))
                                    <a style="color: #dbd301; font-size: 1rem; padding: 2px 6px; border: 1px solid gray; border-radius: 3px; background-color:dark;" href="{{ route('register') }}" class="auth-links ml-2">Register</a>
                                @endif
                            @endif
                        </div>
                    @endif
                </div> --}}


                <div class="card shadow-sm mt-2">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="card-body p-3 h-100">
                                <div class="d-flex flex-row bd-highlight pt-2">

                                    <div class="pl-3">
                                        <div class="mb-2">
                                            <span class="h5 font-weight-bolder text-dark">የማኅበረ ሰብዓዊያን አባል ለመሆን</span>
                                        </div>
                                        <p class="text-muted small text-justify">
                                            e framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="card-body p-3 h-100">
                                <div class="d-flex flex-row bd-highlight pt-2">

                                    <div class="pl-3">
                                        <div class="mb-2">
                                            <span class="h5 font-weight-bolder text-dark">የአባል ዓይነቶች</span>
                                        </div>
                                        <p class="text-muted small text-justify">
                                            Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="card-body p-3 h-100">
                                <div class="d-flex flex-row bd-highlight pt-2">

                                    <div class="pl-3 text-sm">
                                        <div class="mb-2">
                                            <span class="h5 font-weight-bolder text-dark">አባል በመሆኔ ምን እጠቀማለሁ?</span>
                                        </div>
                                        <p class="text-muted small text-justify">
                                            Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="card-body p-3 h-100">
                                <div class="d-flex flex-row bd-highlight pt-2">

                                    <div class="pl-3">
                                        <div class="mb-2">
                                            <span class="h5 font-weight-bolder text-dark">ተጨማሪ</span>
                                        </div>
                                        <p class="text-muted small text-justify">
                                            Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="text-muted">Forge</a>, <a href="https://vapor.laravel.com" class="text-muted">Vapor</a>, <a href="https://nova.laravel.com" class="text-muted">Nova</a>, and <a href="https://envoyer.io" class="text-muted">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="text-muted">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="text-muted">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="text-muted">Echo</a>, <a href="https://laravel.com/docs/horizon" class="text-muted">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="text-muted">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="text-muted">Telescope</a>, and more.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center mb-3">
                            <a class="btn btn-secondary btn-outline btn-lg" href="{{ route('login') }}">Enter</a>
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
</html>
