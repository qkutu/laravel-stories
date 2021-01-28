<x-app-layout>
    <div class="container">
        <div class="overflow-hidden bg-white rounded shadow-sm">
            <div class="p-4 bg-white border-bottom row">
                <div class="col-sm-3">
                @if (!empty($setting->logo))
                    <span>Logo:</span>
                    @if (strpos($setting->logo, 'logos') === false)
                    <img src="{{ asset('uploads/logos/'.$setting->logo) }}" alt="{{ $setting->title }}" class="w-100" id="logo">
                    @else
                    <img src="{{ asset($setting->logo) }}" alt="{{ $setting->title }}" class="w-100" id="logo">
                    @endif
                @endif
                @if (!empty($setting->cover))
                    <span>Cover:</span>
                    @if (strpos($setting->cover,'covers') !== false)
                    <img src="{{ asset($setting->cover) }}" alt="{{ $setting->title }}" class="w-100" id="cover">
                    @else
                    <img src="{{ asset('uploads/covers/'.$setting->cover) }}" alt="{{ $setting->title }}" class="w-100" id="cover">
                    @endif
                @endif
                </div>
                <x-auth-card class="col-sm-9">
                    <x-slot name="logo">
                        <a href="/">
                            <x-application-logo height="30px" />
                        </a>
                    </x-slot>
                    <form action="{{ route('settings.update') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $setting->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="publisher">{{ __('Publisher') }}</label>
                            <input type="text" name="publisher" class="form-control @error('publisher') is-invalid @enderror" value="{{ $setting->publisher }}">
                            @error('publisher')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="logo">{{ __('Logo') }}</label>
                            <input type="file" name="logo" onchange="readLogo(this);" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cover">{{ __('Cover') }}</label>
                            <input type="file" name="cover" onchange="readLogo(this);" class="form-control">
                        </div>
                        <div class="text-right form-group">
                            <button class="btn btn-primary btn-lg"><span><i class="bx bx-save"></i>&nbsp;SAVE</span></button>
                        </div>
                    </form>
                </x-auth-card>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
function readLogo(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#logo')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
function readCover(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#cover')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
