<style>
    .buttons{
        display: flex;
        justify-content: space-between;
    }
</style>
<x-app-layout>
    <div class="container">
        <div class="my-3 text-right">
            <a href="{{ route('stories.create') }}" class="shadow btn btn-primary btn-lg"><span><i class="pt-2 bx bx-plus h2"></i> Create Story</span></a>
        </div>
        <div class="overflow-hidden bg-white rounded shadow-sm">
            <div class="p-4 bg-white border-bottom">
                <div class="row">
                @forelse ($stories as $story)
                    <div class="mb-3 col-sm-4">
                        <x-card class="shadow">
                            <x-slot name="story">
                            @if ($story->story_type == 0)
                                @if (strpos($story->story, 'stories') !== false)
                                <img class="card-img-top" src="{{ asset($story->story) }}" alt="Card image cap">
                                @else
                                <img class="card-img-top" src="{{ asset('uploads/stories/'.$story->story) }}" alt="Card image cap">
                                @endif
                            @else
                                <embed class="card-img-top" src="{{ asset($story->story) }}" alt="Card image cap">
                            @endif
                            </x-slot>
                            <x-slot name="title">{{ Str::limit($story->title, 20, '...') }}</x-slot>
                            {{ Str::limit($story->description, 100, '...') }}
                            <form action="{{ route('stories.destroy',$story->id) }}" class="mt-4 buttons" method="POST">
                                @csrf
                                @method('delete')
                                <a href="{{ route('stories.edit',$story->id) }}" class="shadow btn btn-primary"><span><i class="bx bx-pen"></i>&nbsp;EDIT</span></a>
                                <button class="shadow btn btn-danger" onclick="confirm('Are You Sure ?')"><span><i class="bx bx-trash"></i>&nbsp;DELETE</span></button>
                            </form>
                        </x-card>
                    </div>
                @empty

                @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
