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
                            <h3 class="card-title">inventory</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="mb-3">
                                <a href="{{route('inventory.create')}}" class="btn btn-primary">Add Item</a>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item Name</th>
                                    <th>Description</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($inventory as $key => $item)
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>
                                            <img src="{{$item->getFirstMediaUrl('inventory')}}" alt="" class="rounded" style="height: 50px; object-fit: cover; object-position: center;">
                                            {{$item->item_name}}
                                        </td>
                                        <td>{!! $item->description !!}</td>
                                        <td>{{$item->stock}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>
                                            <a href="{{route('inventory.edit',[$item])}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('inventory.destroy', [$item]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                            {{-- <a href="{{ route('users.destroy', ['user'=>$user->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Item Name</th>
                                    <th>Description</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
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
