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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".addUserModal">Add User</button>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Reg no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Roles</th>
                                    <th>Joined</th>
                                    <th>Add Salary</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->registration_no}}</td>
                                        <td>
                                            <img src="{{$user->avatar}}" alt="" class="rounded" style="height: 30px; width: 30px; object-fit: cover; object-position: center;">
                                            {{$user->name}}
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->gender}}</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                @if($role->name == "staff")
                                                    <span class="badge badge-primary">{{$role->name}}</span>
                                                @elseif($role->name == "admin")
                                                    <span class="badge badge-warning">{{$role->name}}</span>
                                                @elseif($role->name == "laboratorian")
                                                    <span class="badge badge-success">{{$role->name}}</span>
                                                @elseif($role->name == "patient")
                                                    <span class="badge badge-dark">{{$role->name}}</span>
                                                @else
                                                    <span class="badge badge-secondary">No role</span>
                                                @endif

                                            @endforeach
                                        </td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            <a href="{{route('users.salary',$user->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-money-bill"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{route('users.edit',[$user])}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('users.destroy', [$user]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                           {{-- <a href="{{ route('users.destroy', ['user'=>$user->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Reg no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Roles</th>
                                    <th>Joined</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        
                    </div>
                    <x-modals.add-user-modal :roles="$roles"/>
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
            $('#createUserModal').modal('show')
            @endif
        </script>
    </x-slot>
</x-backend-layout>
