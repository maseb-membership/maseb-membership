@extends('layouts.auth.index')

@section('header-menu')
    <div class="inner">
        <img src="{{ asset('assets/image/logos/logo banner dark.png') }}" alt="Gize"
            class="masthead-brand brand-image pr-2" height="54px" style="opacity: 1">
        {{-- <h3 class="masthead-brand">{{ config('app.name', 'Gize')  }}</h3> --}}
        {{-- <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="{{ url('/') }}">Home</a>
            @if (Route::has('login'))

                @auth

                @else
                    <a class="nav-link" href="{{ url('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a class="nav-link active" href="{{ url('register') }}">Register</a>

                    @endif

                @endauth

            @endif
        </nav> --}}
    </div>
@endsection

@section('main-content')

    <div class="d-flex justify-content-center">
        <div class="flex-row">

            <x-jet-authentication-card>
                <x-slot name="logo">
                    <x-jet-authentication-card-logo />
                </x-slot>

                <x-jet-validation-errors class="mb-3" />

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <x-jet-label value="{{ __('Name') }}" />

                            <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-jet-input-error for="name"></x-jet-input-error>
                        </div>

                        <div class="form-group">
                            <x-jet-label value="{{ __('Father Name') }}" />

                            <x-jet-input class="{{ $errors->has('father_name') ? 'is-invalid' : '' }}" type="text"
                                name="father_name" :value="old('father_name')" required autofocus
                                autocomplete="father_name" />
                            <x-jet-input-error for="father_name"></x-jet-input-error>
                        </div>

                        <div class="form-group">
                            <x-jet-label value="{{ __('Grand Father Name') }}" />

                            <x-jet-input class="{{ $errors->has('grand_father_name') ? 'is-invalid' : '' }}" type="text"
                                name="grand_father_name" :value="old('grand_father_name')" required autofocus
                                autocomplete="grand_father_name" />
                            <x-jet-input-error for="grand_father_name"></x-jet-input-error>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="type">{{ __('Gender') }}</label>
                            <div class="inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-file-code-o"></i></span>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="0">--Select--</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{ __('Birth Date') }}</label>
                              <div class="input-group date" id="birth_date" data-target-input="nearest">
                                  <input type="text" name="birth_date" class="form-control datetimepicker-input" data-target="#birth_date">
                                  <div class="input-group-append" data-target="#birth_date" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>

                        <div class="form-group">
                            <label class="control-label" for="type">{{ __('Nationality') }}</label>
                            <div class="inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-file-code-o"></i></span>
                                    <select class="form-control" id="nationality" name="nationality">
                                        <option>--Select--</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Argentinian">Argentinian</option>
                                        <option value="an Argentinian">an Argentinian</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="England">England</option>
                                        <option value="an Englishwoman">an Englishwoman</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="a Frenchwoman">a Frenchwoman</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="an Irishwoman">an Irishwoman</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="a Dutchwoman">a Dutchwoman</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Scotland">Scotland</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Wales">Wales</option>
                                        <option value="a Welshwoman">a Welshwoman</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <x-jet-label value="{{ __('Email') }}" />

                            <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                name="email" :value="old('email')" required />
                            <x-jet-input-error for="email"></x-jet-input-error>
                        </div>

                        <div class="form-group">
                            <x-jet-label value="{{ __('Password') }}" />

                            <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                name="password" required autocomplete="new-password" />
                            <x-jet-input-error for="password"></x-jet-input-error>
                        </div>

                        <div class="form-group">
                            <x-jet-label value="{{ __('Confirm Password') }}" />

                            <x-jet-input class="form-control" type="password" name="password_confirmation" required
                                autocomplete="new-password" />
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <x-jet-checkbox id="terms" name="terms" />
                                    <label class="custom-control-label" for="terms">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '">' . __('Privacy Policy') . '</a>',
]) !!}
                                    </label>
                                </div>
                            </div>
                        @endif

                        <div class="mb-0">
                            <div class="d-flex justify-content-end align-items-baseline">
                                <a class="text-muted mr-3 text-decoration-none" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                                <div class="button">


                                    <x-jet-button>
                                        {{ __('Register') }}
                                    </x-jet-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </x-jet-authentication-card>
        </div>

    </div>


@endsection

@section('js')
    <script>
        $(function () {
            $('#birth_date').datetimepicker({
                format: 'L',
                viewMode: 'years'
            });
        });
    </script>
@endsection
