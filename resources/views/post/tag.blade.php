<x-app-layout>
    <div class="max-w-4xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">Tag: {{ $tag->name }}</h1>
        @foreach ($posts as $post)
            <x-card-post :post="$post" />
        @endforeach

        <div class="mb-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
