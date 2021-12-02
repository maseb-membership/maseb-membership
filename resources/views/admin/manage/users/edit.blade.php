@extends('layouts.admin.index')

@section('page_title', 'Users')

@section('page_title', 'Users')

@section('header_title')
	Users Management Page
@stop

@section('breadcrumb')
		<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Admin</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('admin.manage.user.index') }}">Users Management</a></li>
		<li class="breadcrumb-item active"><a href="#">Edit</a></li>
@endsection

@section('styles')
    @livewireStyles
@endsection

@section('navbar')
    @include('admin.navbar')
@endsection


@section('notifications-dropdown')
    @include('admin.navbar-notifications-dropdown')
@endsection

@section('mainsidebar')
    @include('admin.mainsidebar')
@endsection

@section('content')

    <div class="row .flex-md-row-reverse">


        <div class="col-12 ">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit User (ID: {{ $user->id }}) </h3>

                    <div class="card-tools">
                        <!-- Collapse Button -->
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                    </div>
                    <!-- /.card-tools -->
                </div>


                <div class="card-body">
                    <form method="post" action="{{ route('admin.manage.user.update', ['user' => $user]) }}">
                        @csrf
                        @method('put')
                        <div class="px-4 py-2 sm:p-6">

                            <label for="name" class="">First Name</label>

                            <input class="form-control" type="text" id="name" name="name" placeholder="First Name"
                                value="{{ old('name', $user->name) }}" />

                            @error('name')
                                <p class="text-sm text-red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-2 sm:p-6">

                            <label for="father_name" class="">Father Name</label>

                            <input class="form-control" type="text" id="father_name" name="father_name" placeholder="Last Name"
                                value="{{ old('father_name', $user->father_name) }}" />

                            @error('father_name')
                                <p class="text-sm text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-2 sm:p-6">

                            <label for="grand_father_name" class="">Grand Father Name</label>

                            <input class="form-control" type="text" id="grand_father_name" name="grand_father_name" placeholder="Last Name"
                                value="{{ old('grand_father_name', $user->grand_father_name) }}" />

                            @error('grand_father_name')
                                <p class="text-sm text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-2 sm:p-6">

                            <label for="roles" class="">Gender</label>
                            <div class="select2-purple">
                                <select style="width: 100%;" data-placeholder="Select a Role" name="gender" id="gender"
                                    class="select2 select-gender"
                                    data-dropdown-css-class="select2-purple">

                                        <option value="0">--select--</option>
                                        <option value="1" {{ ($user->gender==1) ? ' selected' : '' }}>Male</option>
                                        <option value="2" {{ ($user->gender==2) ? ' selected' : '' }}>Female</option>

                                </select>
                            </div>

                            @error('roles')
                                <p class="text-sm text-red">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="px-4 py-2 sm:p-6">

                            <label for="mother_name" class="">Mother Name</label>

                            <input class="form-control" type="text" id="mother_name" name="mother_name" placeholder="Last Name"
                                value="{{ old('mother_name', $user->mother_name) }}" />

                            @error('mother_name')
                                <p class="text-sm text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-2 sm:p-6">

                            <label for="email" class="">Email</label>

                            <input class="form-control" type="text" id="email" name="email" placeholder="Email"
                                value="{{ old('email', $user->email) }}" />

                            @error('email')
                                <p class="text-sm text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- <div class="px-4 py-2 sm:p-6">

                            <label for="password" class="">Password</label>

                            <input class="form-control" type="password" id="password" name="password" value="" />

                            @error('password')
                                <p class="text-sm text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-2 sm:p-6">

                            <label for="password_confirmation" class="">Confirm Password</label>

                            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" />

                            @error('password_confirmation')
                                <p class="text-sm text-red">{{ $message }}</p>
                            @enderror
                        </div> --}}

                        <div class="px-4 py-2 sm:p-6">

                            <label for="roles" class="">Roles</label>
                            <div class="select2-purple">
                                <select style="width: 100%;" data-placeholder="Select a Role" name="roles[]" id="roles"
                                    class="select2 slect-roles-multiple"
                                    multiple="multiple"
                                    data-dropdown-css-class="select2-purple">
                                    @foreach ($roles as $id => $role)
                                        <option value="{{ $role->id }}"
                                            {{ in_array($role->id, old('roles', $user->roles->pluck('id')->toArray())) ? ' selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            @error('roles')
                                <p class="text-sm text-red">{{ $message }}</p>
                            @enderror
                        </div>



                        <div class="px-4 pt-4 text-right">
                            <a href="{{ route('admin.manage.user.index') }}" class="btn btn-default mr-2">
                                Cancel
                            </a>
                            <button class="btn btn-primary ">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Select2 -->
    <script src="{{ asset('vendors/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        //Initialize Select2 Elements
        $('.slect-roles-multiple').select2({
            theme: 'bootstrap4'
        });


        $('.select-gender').select2({
            theme: 'bootstrap4'
        });


    </script>
    @livewireScripts
@endsection
