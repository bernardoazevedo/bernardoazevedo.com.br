<x-layout>
    <x-slot:title>
        {{ __('Content') }}
    </x-slot:title>

    <div class="list-content content-body">
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
            <p>Ops... Ainda não há nenhum conteúdo</p>
        @endif
    </div>
</x-layout>
