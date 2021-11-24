<x-backend-layout>

    <x-slot name="links">
    </x-slot>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit User ({{$user->name}})</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="container">
                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                                <form action="{{route('users.update', ['user'=>$user])}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-6">
                                            <!-- Name -->
                                            <div>
                                                <x-label for="name" :value="__('Name*')"/>
                                                <x-input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus/>
                                            </div>
                                        </div>

                                        @if($user->hasRole('patient'))
                                        @else
                                            <div class="col-6">
                                                <x-label for="role" :value="__('Role*')"/>
                                                <select name="role" id="role" class="form-control">
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->name}}" @if($user->hasRole($role->name)) selected @endif>{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif

                                    <!-- Email Address -->
                                        {{--<div class="col-6">
                                            <div>
                                                <x-label for="email" :value="__('Email*')"/>

                                                <x-input id="email"
                                                         type="email"
                                                         name="email"
                                                         --}}{{-- :value="old('email')" --}}{{--
                                                         value="{{$user->email}}"
                                                         placeholder="example@gmail.com"
                                                         required/>
                                            </div>
                                        </div>--}}
                                        <div class="col-6">
                                            <!-- Phone Address -->
                                            <div>
                                                <x-label for="phone" :value="__('Phone*')"/>

                                                <x-input id="phone"
                                                         type="tel"
                                                         name="phone"
                                                         {{-- :value="old('phone')" --}}
                                                         value="{{$user->phone}}"
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
                                                         value="{{\Carbon\Carbon::now($user->dob)->format('j F, Y')}}"
                                                         required/>
                                            </div>
                                        </div>
                                        <!-- Gender-->
                                        <div class="col-6">
                                            <div class="mt-4">
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
                                                    @foreach($bloodGroups as $bloodGroup)
                                                        <option value="{{$bloodGroup->id}}" @if($bloodGroup->id === $user->blood_groups_id) selected @endif>{{$bloodGroup->group_name}}</option>
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


                                        {{-- about  --}}
                                        <div class="col-12">
                                            <!-- Confirm Password -->
                                            <div class="mt-4">
                                                <x-label for="about_user" :value="__('About')"/>

                                                <div class="form-floating">
                                                    <textarea class="form-control" name="about" placeholder="Leave a comment here" id="about_user">{{$user->about}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">

                                            <x-button class="mt-4">
                                                {{ __('Update User')}}
                                            </x-button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-backend-layout>
