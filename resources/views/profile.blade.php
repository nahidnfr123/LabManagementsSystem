<x-frontend-layout>
    <!-- NEWS -->
    @php
        $amount = 0;
        $user_id = null;
        $appointment_id = null;
    @endphp

    <div class="container">
        @if($appointments)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">App.. no.</th>
                    <th scope="col">App.. Date</th>
                    <th scope="col">App.. Time</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Report</th>
                </tr>
                </thead>
                <tbody>
                @foreach($appointments as $app)
                    <tr>
                        <th scope="row">{{$app->appointment_no}}</th>
                        <td>{{$app->appointment_date}}</td>
                        <td>{{$app->appointment_time}}</td>
                        <td>{{$app->created_at}}</td>
                        <td>{{$app->cost}}</td>
                        <td>
                            @if(count($app->labReports))
                                <a href="{{ url('view-report/'.$app->id) }}" class="btn btn-sm btn-success">
                                    View {{count($app->labReports)}} Report
                                </a>
                            @else
                                <div class="text-danger">No Reports available</div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-frontend-layout>

{{--
<x-guest-layout>
    <x-slot name="links"></x-slot>
    <x-slot name="scripts"></x-slot>

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/backend') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            @endauth
        </div>
    </div>
</x-guest-layout>
--}}
