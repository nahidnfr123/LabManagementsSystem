<div class="modal fade addUserModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('users.store')}}">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Name')"/>

                                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus/>
                            </div>
                        </div>

                        <div class="col-6">
                            <x-label for="role" :value="__('Role')"/>
                            <select name="role" id="role" required class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Email Address -->
                        <div class="col-6">
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')"/>

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
                                <x-label for="phone" :value="__('Phone')"/>

                                <x-input id="phone"
                                         type="tel"
                                         name="phone"
                                         :value="old('phone')"
                                         placeholder="01_________"
                                         required
                                         maxlength="11"/>
                            </div>
                        </div>

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

                        <div class="d-flex justify-content-between align-center flex-wrap mt-4">
                            <x-button class="ms-4">
                                {{ __('Create User') }}
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
