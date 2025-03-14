<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            {{ __('Content') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="lg:grid lg:grid-cols-2 lg:space-x-4 space-y-6 lg:space-y-0">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @include('content.partials.update-content-form')
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @include('content.partials.parsed-content')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('content.partials.delete-content-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

