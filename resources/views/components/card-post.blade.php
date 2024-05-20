@props(['post'])
<article class="mb-8 mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($post->image)
        <img class="w-full h-72 object-cover object-center"
            src="{{ 'http://127.0.0.1/blog/public' . Storage::url($post->image->url) }}" alt="">
    @else
        <img class="w-full h-72 object-cover object-center"
            src="https://media.istockphoto.com/id/181928587/es/foto/volc%C3%A1n-monte-bromo-java-oriental-indonesia-surabuya.jpg?s=1024x1024&w=is&k=20&c=hczOJMZn1VPVNt__27CSrHuGNfTvy5yqSiHq9bz4GgU="
            alt="">
    @endif
    <div class="px-6 py-4">
        <h2 class="font-bold text-xl mb-2">
            <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
        </h2>
        <div class="text-gray-700 text-base">
            {!! $post->extract !!}
        </div>
        <div class="px-6 pt-4 pb-2">
            @foreach ($post->tags as $tag)
                <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2"
                    href="{{ route('posts.tag', $tag) }}">{{ $tag->name }}</a>
            @endforeach

        </div>
    </div>
</article>
