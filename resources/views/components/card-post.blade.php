@props(['post'])
<article class="mb-8 mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-40 object-cover object-center" src="{{ 'http://127.0.0.1/blog/public' .Storage::url($post->image->url)}}" alt="">
    <div class="px-6 py-4">
        <h2 class="font-bold text-xl mb-2">
            <a href="{{route('posts.show',$post)}}">{{$post->name}}</a>
        </h2>
        <div class="text-gray-700 text-base">
            {{$post->extract}}
        </div>
        <div class="px-6 pt-4 pb-2">
            @foreach ($post->tags as $tag)
                <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2" href="{{route('posts.tag',$tag)}}">{{$tag->name}}</a>
            @endforeach

        </div>
    </div>
</article>