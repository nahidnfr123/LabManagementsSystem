<x-backend-layout>

    <x-slot name="links">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    </x-slot>





<div class="container">
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <form action="{{route('lab-test.update', [$labTest])}}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        {{-- {{dd($user);}} --}}

        <div class="row">
            <div class="col-6">
                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name*')"/>

                    <x-input id="name" type="text" name="name" value="{{$labTest->name}}" required autofocus/>
                </div>
            </div>
            {{-- start additional info  --}}
            <div class="col-6">
                <div class="mt-4">
                    <x-label for="cost" :value="__('Cost*')"/>

                    <x-input id="cost"
                                type="number"
                                name="cost"
                                value="{{$labTest->cost}}"
                                required/>
                </div>
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
                        <textarea class="form-control" name="description" placeholder="description" id="about_user">{{$labTest->description}}</textarea>
                    </div>
                </div>
            </div>

            <div class="col-12">

                <x-button class="mt-4">
                    {{ __('Update')}}
                </x-button>
            </div>
        </div>
    </form>
</div>



<x-slot name="scripts">
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</x-slot>
</x-backend-layout>
