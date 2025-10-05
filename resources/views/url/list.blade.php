<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-primary-button class="mb-4"><a href="/new-url">{{ __('Create new url') }}</a></x-primary-button>

            @if(count($urls))
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-600">

                        <ul class="ml-4 text-lg font-semibold list-disc space-y-4">
                            @foreach($urls as $url)
                                <a class=" hover:text-indigo-500" href="/url/{{ $url->name }}">{{ $url->name }}</a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-600">
                        <p>{{ __("Ops... Ainda não existem urls cadastradas") }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
