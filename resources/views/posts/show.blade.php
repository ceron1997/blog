<x-app-layout>
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{ $post->name }}</h1>
        <div class="text-lg text-gray-500 mb-2">
            {!! $post->extract !!}
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3  gap-6">
            {{-- contenido principal --}}
            <div class="lg:col-span-2">
                <figure>

                    @if ($post->image)
                        <img class="w-full h-80 object-cover object-center"
                            src="{{ 'http://127.0.0.1/blog/public' . Storage::url($post->image->url) }}" alt="">
                    @else
                        <img class="w-full h-80 object-cover object-center"
                            src="https://media.istockphoto.com/id/181928587/es/foto/volc%C3%A1n-monte-bromo-java-oriental-indonesia-surabuya.jpg?s=1024x1024&w=is&k=20&c=hczOJMZn1VPVNt__27CSrHuGNfTvy5yqSiHq9bz4GgU="
                            alt="">
                    @endif


                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {!! $post->body !!}
                </div>
            </div>


            {{-- contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">
                    mas en {{ $post->category->name }}
                </h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="grid grid-cols-2" href="{{ route('posts.show', $similar) }}">
                                @if ($similar->image)
                                    <img class="w-40 h-20 object-cover object-center"
                                        src="{{ 'http://127.0.0.1/blog/public' . Storage::url($similar->image->url) }}"
                                        alt="">
                                @else
                                    <img class="w-40 h-20 object-cover object-center"
                                        src="https://media.istockphoto.com/id/181928587/es/foto/volc%C3%A1n-monte-bromo-java-oriental-indonesia-surabuya.jpg?s=1024x1024&w=is&k=20&c=hczOJMZn1VPVNt__27CSrHuGNfTvy5yqSiHq9bz4GgU="
                                        alt="">
                                @endif
                                <span class=" text-gray-600">{{ $similar->name }}</span>
                            </a>

                        </li>
                    @endforeach
                </ul>

            </aside>



        </div>

    </div>
</x-app-layout>
