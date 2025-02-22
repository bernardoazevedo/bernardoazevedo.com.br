<x-layout>
    <x-slot:title>
        {{ __('Content') }}
    </x-slot:title>

    <div class="list-content px-2 mb-8 mx-auto flex flex-col gap-y-1 sm:w-auto md:w-1/2 text-gray-600">
        <h1>{{ __('Erro 404') }}</h1>
        
        @if (config('app.debug'))
            <p>{{ $exception->getMessage() }}</p>
        @else
            <p>{{ __('Ops... O conteúdo não foi encontrado, tente novamente.') }}</p>
        @endif
    </div>
</x-layout>