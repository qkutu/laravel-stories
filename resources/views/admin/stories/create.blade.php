<x-app-layout>
    <div class="container">
        <div class="overflow-hidden bg-white rounded shadow-sm">
            <div class="p-4 bg-white border-bottom row">
                <div class="col-sm-3">
                    <img id="blah" src="http://placehold.it/180" class="mt-2 w-100" alt="your image" />
                </div>
                <x-auth-card class="col-sm-9">
                    <x-slot name="logo">
                        <a href="/" class="text-dark h5">
                            <x-application-logo height="30px" />&nbsp; Add Story
                        </a>
                    </x-slot>
                    <form action="{{ route('stories.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea  type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="" cols="30" rows="10">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="story_type">{{ __('Story Type') }}</label>
                            <select name="story_type" id="story_type" class="form-control">
                                <option value="0">Image</option>
                                <option value="1">Video</option>
                            </select>
                            @error('story_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="priority">{{ __('Priority') }}</label>
                            <input type="number" min="0" name="priority" class="form-control @error('priority') is-invalid @enderror" value="{{ old('priority') }}">
                            <small>Higher priority comes first in story</small>
                            @error('priority')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <label for="story">{{ __('Story') }}</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('story') is-invalid @enderror" name="story" id="validatedCustomFile" onchange="readURL(this);" required>
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                            @error('story')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mt-3 text-right form-group">
                            <button class="shadow btn btn-primary btn-lg"><span><i class="bx bx-save"></i>&nbsp;SAVE</span></button>
                        </div>
                    </form>
                </x-auth-card>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function(){
    $('select[name=story_type]').change(function(){
        type = $(this).val();
        if(type == 0){
            $('#blah').css({'display':'block'});
        }else{
            $('#blah').css({'display':'none'});
        }
    });
});
</script>
