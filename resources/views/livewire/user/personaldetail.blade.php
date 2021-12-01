<div>
    <dl class="row">
        <dt class="col-sm-4">Name</dt>
        <dd class="col-sm-8">{{ $name }}</dd>

        <dt class="col-sm-4">Father Name</dt>
        <dd class="col-sm-8">{{ $father_name }}</dd>


        <dt class="col-sm-4">Grand Father Name</dt>
        <dd class="col-sm-8">{{ $grand_father_name }}</dd>

        <dt class="col-sm-4">Email</dt>
        <dd class="col-sm-8">{{ $email }}</dd>

        <dt class="col-sm-4">Gender</dt>
        <dd class="col-sm-8">{{ $gender==1? 'Male': ($gender==2?'Female':'') }}</dd>

        <dt class="col-sm-4">Mother Name</dt>
        <dd class="col-sm-8">{{ $mother_name }}</dd>

        <dt class="col-sm-4">Birth Date</dt>
        <dd class="col-sm-8">{{ $birth_date }}</dd>

        <dt class="col-sm-4">Nationality</dt>
        <dd class="col-sm-8">{{ $nationality }}</dd>


        <dt class="col-sm-4">Marital Status</dt>
        <dd class="col-sm-8">{{ $marital_status==0? 'Not Married': ($marital_status==1?'Married':($marital_status==2?'Divorced':($marital_status==3?'Widowed':''))) }}</dd>

      </dl>
    {{-- <button data-toggle="modal" data-target="#personaldetailsEditModal" wire:click="edit({{ $personaldetail->id }})" class="btn btn-primary btn-sm">Edit</button> --}}

</div>



<!-- Modal -->
<div wire:ignore.self class="modal fade" id="personaldetailsEditModal" tabindex="-1" role="dialog" aria-labelledby="personalDetailsEditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="personalDetailsEditModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" wire:model="email" id="email" placeholder="Enter Email">
                        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <input type="hidden" wire:model="user_id">



                        <div class="form-group">
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" wire:model="name" id="name" placeholder="{{ __('Enter Name') }}">
                                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="father_name">{{ __('Father Name') }}</label>
                                <input type="text" class="form-control" wire:model="father_name" value="father_name" id="father_name" placeholder="{{ __('Enter Father Name') }}">
                                @error('father_name') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="form-group">
                                <label for="grand_father_name">{{ __('Grand Father Name') }}</label>
                                <input type="text" class="form-control" wire:model="grand_father_name" id="grand_father_name" placeholder="{{ __('Enter Grand Father Name') }}">
                                @error('grand_father_name') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        {{--
                        <div class="form-group">
                            <label class="control-label"
                                for="type">{{ __('Gender') }}</label>
                            <div class="inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="fa fa-file-code-o"></i></span>
                                    <select wire:model="gender" class="form-control">
                                        <option value="0">--Select--</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>

                                </div>
                            </div>
                        </div> --}}






                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
       </div>
    </div>
</div>












