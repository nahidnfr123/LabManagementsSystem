<x-backend-layout>

    <x-slot name="links">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    </x-slot>





<div class="container">
    <!-- Validation Errors -->
    {{-- <x-auth-validation-errors class="mb-4" :errors="$errors"/> --}}
    <h3>Reports</h3>
    <div class="row">
        @foreach($labtests as $key => $value)
            <div class="col-6">
                <div>
                    File Name : {{$value->file_name}}
                    <iframe src="{{URL::to('/files')}}/{{$value->file_name}}" width="100%" height="600"></iframe>
                </div>
            </div>
        @endforeach
    </div>
    {{-- <form action="{{route('report.pdf.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="labtest_id" value="{{$labtests->id}}" >
        <div class="row">
            <div class="col-6">
                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name*')"/>
                    <x-input id="name" type="file" name="upload[]" required multiple/>
                </div>
            </div>
            <div class="col-12">

                <x-button class="mt-4">
                    {{ __('Add Files')}}
                </x-button>
            </div>
    </form> --}}
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
