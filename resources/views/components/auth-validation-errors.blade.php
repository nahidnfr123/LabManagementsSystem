@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="alert alert-danger" role="alert">
            <div class="text-danger">
                {{ __('Whoops! Something went wrong.') }}
            </div>

            <ul class="mt-3 text-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
