<div class="modal fade addUserModal" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog .modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                <form action="{{route('users.store')}}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Name*')"/>

                                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus/>
                            </div>
                        </div>

                        <div class="col-6">
                            <x-label for="role" :value="__('Role*')"/>
                            <select name="role" id="role" required class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Email Address -->
                        <div class="col-6">
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email*')"/>

                                <x-input id="email"
                                         type="email"
                                         name="email"
                                         :value="old('email')"
                                         placeholder="example@gmail.com"
                                         required/>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- Phone Address -->
                            <div class="mt-4">
                                <x-label for="phone" :value="__('Phone*')"/>

                                <x-input id="phone"
                                         type="tel"
                                         name="phone"
                                         :value="old('phone')"
                                         placeholder="01_________"
                                         required
                                         maxlength="11"/>
                            </div>
                        </div>

                        {{-- start additional info  --}}

                        <div class="col-6">
                            <div class="mt-4">
                                <x-label for="dob" :value="__('Date Of Birth*')"/>

                                <x-input id="dob"
                                         type="date"
                                         name="dob"
                                         :value="old('dob')"
                                         required/>
                            </div>
                        </div>
                           <!-- Gender-->
                        <div class="col-6">
                            <div class="mt-4" >
                                <x-label for="gender" :value="__('Gender*')"/>
                                <div class="">
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input " type="radio" required name="gender" id="inlineRadio1" value="female">
                                    <label class="form-check-label" for="inlineRadio1">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" required name="gender" id="inlineRadio2" value="male">
                                    <label class="form-check-label" for="inlineRadio2">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input " type="radio" required name="gender" id="inlineRadio3" value="others">
                                    <label class="form-check-label" for="inlineRadio3">Others</label>
                                    </div>
                                </div>

                            </div>

                        </div>




                        {{-- second row  --}}
                        <div class="col-6">
                            <div class="mt-4">
                                <x-label for="blood_group" :value="__('Blood Group')"/>
                                <select name="blood_groups_id" id="blood_group" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{'1'}}">{{'B+'}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>




                        <div class="col-6">
                            <div class="mt-4">
                                <x-label for="formFile" :value="__('Upload a photo')"/>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>



                        {{-- end additional info  --}}


                        <div class="col-6">
                            <!-- Password -->
                            <div class="mt-4">
                                <x-label for="password" :value="__('Password')"/>

                                <x-input id="password"
                                         type="password"
                                         name="password"
                                         required autocomplete="new-password"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                                <x-input id="password_confirmation"
                                         type="password"
                                         name="password_confirmation" required/>
                            </div>
                        </div>

                        {{-- about  --}}
                        <div class="col-12">
                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-label for="about_user" :value="__('About')"/>

                                <div class="form-floating">
                                    <textarea class="form-control" name="about" placeholder="Leave a comment here" id="about_user"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-center flex-wrap mt-4">
                            <x-button class="ms-4">
                                {{ __('Create User')}}
                            </x-button>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


