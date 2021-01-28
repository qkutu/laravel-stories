@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="text-danger">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
