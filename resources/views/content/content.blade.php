<x-layout>
    <x-slot:title>
        {{ $content->title }}
    </x-slot:title>

    <article class="parsedown">
        {!! $content->text !!}
    </article>
</x-layout>
