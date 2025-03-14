<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-600">
                    <x-primary-button><a href="/new-content">{{ __('Create new Content') }}</a></x-primary-button>
                    
                    <ul class="ml-4 text-lg font-semibold list-disc">
                        @foreach($contents as $content)
                            <li class="mt-3 ">
                                <span>{{ $content->id }}</span> - 
                                <a class=" hover:text-indigo-500"
                                href="/edit/{{ $content->title }}">{{ $content->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
