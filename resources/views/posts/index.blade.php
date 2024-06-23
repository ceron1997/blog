<x-app-layout>
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if ($loop->first) md:col-span-2 @endif"
                    style="background-image: url( @if ($post->image) {{ 'http://127.0.0.1/blog/public' . Storage::url($post->image->url) }}
                    @else 'https://media.istockphoto.com/id/181928587/es/foto/volc%C3%A1n-monte-bromo-java-oriental-indonesia-surabuya.jpg?s=1024x1024&w=is&k=20&c=hczOJMZn1VPVNt__27CSrHuGNfTvy5yqSiHq9bz4GgU=' @endif  )">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        {{-- segun esto ayuda a que tailwind tome en cuenta estas clases y no las elimine en un proceso llamado purga --}}
                        <!-- bg-gray-600 bg-red-600 bg-green-600 bg-yellow-600 bg-blue-600 bg-indigo-600 -->
                        <div>
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('posts.tag', $tag) }}"
                                    class="inline-block px-3 h-6  bg-{{ $tag->color }}-600 text-white rounded-full">{{ $tag->name }}</a>
                            @endforeach

                        </div>

                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
                        </h1>
                    </div>

                </article>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $posts->links() }}

        </div>
    </div>
</x-app-layout>
