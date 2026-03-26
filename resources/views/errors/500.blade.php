<x-layout>
    <x-slot:title>
        {{ __('Erro 500') }}
    </x-slot:title>

    <div class="standard-dialog center error-dialog">
        <h1 class="dialog-text">{{ __('Erro 500') }}</h1>

        @if (config('app.debug'))
            <p class="dialog-text">{{ $exception->getMessage() }}</p>
        @else
            <p class="dialog-text">{{ __('Ops... Ocorreu um erro interno no servidor, tente novamente.') }}</p>
        @endif

        <div class="flex justify-center mt-4">
            <a href="/" class="btn btn-default">Home</a>
        </div>
    </div>
</x-layout>