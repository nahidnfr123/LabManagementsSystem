<x-frontend-layout>

    <div class="container">
        <h3>Reports</h3>
        <div class="row">
            @foreach($labtests as $key => $value)
                <div class="col-6">
                    <div>
                        <h3>Title: {{$value->title}}</h3>
                        File Name : {{$value->file_name}}
                        <iframe src="{{URL::to('/files')}}/{{$value->file_name}}" width="100%" height="500" style="max-height: 500px"></iframe>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-frontend-layout>
