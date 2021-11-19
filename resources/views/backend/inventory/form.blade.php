<x-backend-layout>

    <x-slot name="links">
    </x-slot>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                    <form action="{{!empty($inventory)?route('inventory.update', [$inventory]): route('inventory.store')}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        {{ !empty($inventory)?method_field('PUT'):method_field('POST') }}
                        {{-- {{dd($user);}} --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <x-label for="name" :value="__('Item Name*')"></x-label>
                                    <x-input id="name" type="text" name="item_name" value="{{old('item_name') ?? $inventory->item_name ?? ''}}" required></x-input>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <x-label for="stock" :value="__('Stock*')"></x-label>
                                    <x-input id="stock" type="number" name="stock" value="{{old('stock') ?? $inventory->stock ?? ''}}" required></x-input>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <x-label for="name" :value="__('Status*')"></x-label>
                                    <select name="status" id="" class="form-control">
                                        <option value="1">Available</option>
                                        <option value="0">Not available</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <x-label for="formFile" :value="__('Upload a photo')"></x-label>
                                    <input class="form-control" type="file" id="formFile" name="photo">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <x-label for="description" :value="__('Description*')"></x-label>
                                    <textarea name="description" placeholder="description" id="description" required>{{old('description') ?? $inventory->description ?? ''}}</textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <x-button class="mt-4">{{ !empty($inventory) ? __('Update') : __('Save')}}</x-button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <x-slot name="scripts">
        <script>
            CKEDITOR.replace('description');
            /*ClassicEditor.create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });*/
        </script>
    </x-slot>
</x-backend-layout>
