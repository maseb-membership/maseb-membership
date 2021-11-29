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
    <link rel="stylesheet" href="{{ asset('vendors/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">


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
                                                          <div class="step" data-target="#personal-details-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="personal-details-part" id="personal-details-part-trigger">
                                                              <span class="bs-stepper-circle">1</span>
                                                              <span class="bs-stepper-label">Personal Details</span>
                                                            </button>
                                                          </div>
                                                          <div class="line"></div>
                                                          <div class="step" data-target="#address-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="address-part" id="address-part-trigger">
                                                              <span class="bs-stepper-circle">2</span>
                                                              <span class="bs-stepper-label">Address</span>
                                                            </button>
                                                          </div>
                                                        </div>
                                                        <div class="bs-stepper-content">
                                                          <!-- your steps content here -->
                                                          <div id="personal-details-part" class="content" role="tabpanel" aria-labelledby="personal-details-part-trigger">
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

                                                          <div id="address-part" class="content" role="tabpanel" aria-labelledby="address-part-trigger">

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

                            <div class="col-12 text-center mb-3">
                                <a class="btn btn-secondary btn-outline btn-lg mr-3 mb-2" href="#">Submit
                                    Form</a>
                                <a class="btn btn-secondary btn-outline btn-lg mb-2"
                                    href="{{ route('logout') }}">Logout</a>
                            </div>

                            @auth

                                @if(auth()->user()->hasRole('finance-admin')||auth()->user()->hasRole('super-admin')||
                                auth()->user()->hasRole('membership-admin')||auth()->user()->hasRole('system-manager'))
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
            </div>
        </div>

</body>

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
        <script src="{{ asset('vendors/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script>
    // BS-Stepper Init


    $(document).ready(function () {
        var stepper = new Stepper($('.bs-stepper')[0])
        var stepperEl = $('.bs-stepper')[0];

        stepperEl.addEventListener('shown.bs-stepper', function (event) {
            let stepno = event.detail.indexStep;
            if(stepno !=0) {
                $('#prev').show();
            }
            else {
                $('#prev').hide();
            }
        });

        $('#next').on('click', function(){
            stepper.next();
        });

        $('#prev').on('click', function(){
            stepper.previous();
        });

        $('#birth_date').datetimepicker({
            format: 'L',
            viewMode: 'years'
        });
    });
</script>

</html>
