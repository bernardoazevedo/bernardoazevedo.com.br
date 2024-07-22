<x-layout>
    <x-slot:title>
        Content
    </x-slot:title>

    <h1>Posts</h1>

    <div class="parsedown">
        {!! $htmlText !!}
    </div>
</x-layout>