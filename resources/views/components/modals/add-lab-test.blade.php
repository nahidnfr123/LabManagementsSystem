<div class="modal fade addUserModal" id="createLabTest" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog .modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Lab Test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                <form action="{{route('lab-test.store')}}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Name*')"/>

                                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus/>
                            </div>
                        </div>
                        {{-- start additional info  --}}
                        <div class="col-6">
                            <x-label for="cost" :value="__('Cost*')"/>

                            <x-input id="cost"
                                     type="number"
                                     name="cost"
                                     :value="old('cost')"
                                     required/>
                        </div>
                        {{-- second row  --}}

                        {{-- <div class="col-6">
                            <div class="mt-4">
                                <x-label for="formFile" :value="__('Upload a photo')"/>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div> --}}

                        {{-- about  --}}
                        <div class="col-12">
                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-label for="description" :value="__('About')"/>

                                <div class="form-floating">
                                    <textarea class="form-control" name="description" placeholder="description" id="description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-center flex-wrap mt-4">
                            <x-button class="ms-4">
                                {{ __('Create')}}
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
