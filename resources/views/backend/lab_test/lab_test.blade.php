<x-backend-layout>

    <x-slot name="links">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    </x-slot>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hr</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="mb-3">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".addUserModal">Add Lab Test</button>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Details</th>
                                    <th>Joined</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($labtests as $test)
                                    <tr>
                                        <td>
                                            {{$test->name}}
                                        </td>
                                        <td>{{$test->description}}</td>
                                        <td>{{$test->created_at}}</td>
                                        <td>
                                            <a href="{{route('lab-test.edit',[$test])}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('lab-test.destroy', [$test]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
{{--                                            <a href="{{ route('users.destroy', ['user'=>$user->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Details</th>
                                    <th>Joined</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <x-modals.add-lab-test/>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

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


            @if ($errors->any())
            $('#createLabTest').modal('show')
            @endif
        </script>
    </x-slot>
</x-backend-layout>
