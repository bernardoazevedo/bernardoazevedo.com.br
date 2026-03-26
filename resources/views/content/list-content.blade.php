<x-layout>
    <x-slot:title>
        {{ __('Content') }}
    </x-slot:title>

    <div class="list-content">
        <h1>{{ __('Content') }}</h1>

        @if($contents && count($contents))
            <ul>
                @foreach($contents as $content)
                    <li>
                        <a href="/content/{{ $content->title }}">{{ $content->title }}</a>
                    </li>
                @endforeach
            </ul>
        @else
            <h2>Ops... Ainda não há nenhum conteúdo</h2>
        @endif
    </div>
</x-layout>
