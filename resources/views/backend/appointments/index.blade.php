<x-backend-layout>

    <x-slot name="links">
    </x-slot>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Appointments</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{--<div class="mb-3">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".addUserModal">Add Lab Test</button>
                            </div>--}}
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Appointment Number</th>
                                    <th>User Info</th>
                                    <th>Cost</th>
                                    <th>Status</th>
                                    <th>Tests</th>
                                    <th>Appointment Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($appointments as $test)
                                    <tr>
                                        <td>
                                            {{$test->appointment_no}}
                                        </td>
                                        <td>
                                            <div>Name: <strong>{{$test->user->name}}</strong></div>
                                            <div>Email: <strong>{{$test->user->email}}</strong></div>
                                            <div>Phone: <strong>{{$test->user->phone}}</strong></div>
                                        </td>
                                        <td>{{$test->cost}}</td>
                                        <td>{{$test->status}}</td>
                                        <td>
                                            <ul>
                                                @foreach($test->labTests as $tests)
                                                    <li>{{$tests->name}}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{$test->appointment_date}}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                @if($test->labReports && count($test->labReports))
                                                    <a href="{{ url('backend/view-report/'.$test->id) }}" class="btn btn-sm btn-success">
                                                        View {{count($test->labReports)}} Report
                                                    </a>
                                                @endif
                                                @if($test->status !== 'confirmed')
                                                    <a href="{{ url('backend/set-status/'.$test->id.'/'.'confirmed'.'/') }}" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Accept</a>
                                                    <a href="{{ url('backend/set-status/'.$test->id.'/'.'reject'.'/') }}" class="btn btn-sm btn-danger"><i class="fas fa-ban"></i> Reject</a>
                                                @else
                                                    <a href="{{ url('backend/add-report/'.$test->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-check"></i> Add Report</a>
                                                @endif
                                            </div>
                                            {{-- <form action="{{ route('lab-test.destroy', [$test]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </form> --}}
                                            {{--                                            <a href="{{ route('users.destroy', ['user'=>$user->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Appointment Number</th>
                                    <th>User Info</th>
                                    <th>Cost</th>
                                    <th>Status</th>
                                    <th>Tests</th>
                                    <th>Appointment Date</th>
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
        <script>

            $(function () {
                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                });
            });


            @if ($errors->any())
            $('#createLabTest').modal('show')
            @endif
        </script>
    </x-slot>
</x-backend-layout>
