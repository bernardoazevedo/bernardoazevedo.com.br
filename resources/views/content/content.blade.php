<x-layout>
    <x-slot:title>
        {{ $content->title }}
    </x-slot:title>

    <div class="parsedown content-body">
        {!! $content->text !!}
    </div>
</x-layout>
