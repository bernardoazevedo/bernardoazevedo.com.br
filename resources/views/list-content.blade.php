<x-layout>
    <x-slot:title>
        {{ $pageTitle }}
    </x-slot:title>

    <div class="list-content px-4 mb-8 mx-auto flex flex-col gap-y-2 sm:w-auto md:w-1/2 text-gray-600">
        {!! $htmlText !!}
    </div>
</x-layout>