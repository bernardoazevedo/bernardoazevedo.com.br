<x-layout>
    <x-slot:title>
        Content
    </x-slot:title>

    <h1>Posts</h1>

    <div class="parsedown p-4 mx-auto flex flex-col gap-y-4 sm:w-auto md:w-1/2">

        {!! $htmlText !!}
    </div>
</x-layout>