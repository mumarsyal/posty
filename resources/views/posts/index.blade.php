@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-3 rounded-lg">
            <form class="mt-8 space-y-6" action="{{ route('posts') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea id="body" name="body" cols="30" rows="4"
                        class="rounded-lg w-full p-4 border-2 bg-gray-100 @error('body') border-red-500 @enderror"
                        placeholder="Post Something!"></textarea>

                    @error('body')
                        <span class="text-sm text-red-700">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">
                        Post
                    </button>
                </div>
            </form>

            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-4">
                        <a href="" class="font-bold">{{ $post->user->name }}</a>
                        <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                        <p class="mb-2">{{ $post->body }}</p>
                    </div>
                @endforeach

                {{ $posts->links() }}
            @else
                No posts available
            @endif
        </div>
    </div>
@endsection
