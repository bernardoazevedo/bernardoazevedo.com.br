<x-layout>
    <x-slot:title>
        {{ __('Content') }}
    </x-slot:title>

    <div class="list-content px-2 mb-8 mx-auto flex flex-col gap-y-1 sm:w-auto md:w-1/2 text-gray-600">
        <h1>{{ __('Content') }}</h1>

        @if($contents && count($contents))
            <ul class="text-lg font-semibold list-disc">
                @foreach($contents as $content)
                    <li class="mt-3 ">
                        <a class=" hover:text-indigo-500"
                        href="/content/{{ $content->title }}">{{ $content->title }}</a>
                    </li>
                @endforeach
            </ul>

        @else
            <h2>Ops... Ainda não há nenhum conteúdo</h2>
        @endif
    </div>
</x-layout>
