<x-layout>
    <x-slot:title>
        Content
    </x-slot:title>

    <div class="parsedown px-4 mb-8 mx-auto flex flex-col gap-y-2 sm:w-auto md:w-1/2">
        {!! $htmlText !!}
    </div>
</x-layout>