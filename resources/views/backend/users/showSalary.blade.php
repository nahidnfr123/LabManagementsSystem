<x-backend-layout>

    <x-slot name="links">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    </x-slot>

    <div class="container">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
        <h3>Add Salary for {{$user->name}}</h3>
        {{-- <form action="{{route('salary.store')}}" method="POST">
            @csrf --}}
        <div class="row">
            <div class="col-6">
                <!-- Name -->
                <div>
                    <x-label for="salary_date" :value="__('Date*')"/>

                    <x-input id="salary_date" type="date" name="salary_date" value="" required autofocus/>
                </div>
            </div>
            {{-- start additional info  --}}
            <div class="col-6">
                <div>
                    <x-label for="cost" :value="__('Amount*')"/>

                    <x-input id="total_amount"
                             type="number"
                             name="cost"
                             value=""
                             required/>
                </div>
            </div>
            <div class="col-12">
                <br>
                <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                </button>
            </div>
        </div>
        {{-- </form> --}}
    </div>


    <x-slot name="scripts">
        <!-- DataTables -->
    {{--<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>--}}
    <!-- page script -->
        <script>
            var obj = {};
            obj.cus_name = $('#customer_name').val();
            obj.cus_phone = $('#mobile').val();
            obj.cus_email = $('#email').val();
            obj.cus_addr1 = $('#address').val();
            obj.salary_user_id = {!! $user->id !!}
            $("#total_amount").change(function () {
                obj.amount = $('#total_amount').val();
                console.log(obj.amount);
            });
            $("#salary_date").change(function () {
                obj.salary_date = $('#salary_date').val();
            });
            $('#sslczPayBtn').prop('postdata', obj);
            (function (window, document) {
                var loader = function () {
                    var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                    // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                    script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
                    tag.parentNode.insertBefore(script, tag);
                };
                window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
            })(window, document);
            // $(function () {
            //     $("#example1").DataTable({
            //         "responsive": true,
            //         "autoWidth": false,
            //     });
            //     $('#example2').DataTable({
            //         "paging": true,
            //         "lengthChange": false,
            //         "searching": false,
            //         "ordering": true,
            //         "info": true,
            //         "autoWidth": false,
            //         "responsive": true,
            //     });
            // });
        </script>
    </x-slot>
</x-backend-layout>
