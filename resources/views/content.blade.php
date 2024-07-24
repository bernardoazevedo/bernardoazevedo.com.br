<x-layout>
    <x-slot:title>
        Content
    </x-slot:title>

    <div class="parsedown p-4 mx-auto flex flex-col gap-y-2 sm:w-auto md:w-1/2">
        {!! $htmlText !!}
    </div>
</x-layout>