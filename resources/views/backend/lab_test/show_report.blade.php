<x-backend-layout>

    <x-slot name="links">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    </x-slot>


    <div class="container">
        <h3>Reports</h3>
        <div class="row">
            @foreach($labtests as $key => $value)
                <div class="col-6">
                    <div>
                        <h3>Title: {{$value->title}}</h3>
                        File Name : {{$value->file_name}}
                        <iframe src="{{URL::to('/files')}}/{{$value->file_name}}" width="100%" height="600"></iframe>
                    </div>
                </div>
            @endforeach
        </div>
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
