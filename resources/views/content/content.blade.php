<x-layout>
    <x-slot:title>
        {{ $content->title }}
    </x-slot:title>

    <div class="parsedown px-4 mb-8 mx-auto flex flex-col gap-y-2 sm:w-auto md:w-1/2 text-gray-600">
        {!! $content->text !!}
    </div>
</x-layout>