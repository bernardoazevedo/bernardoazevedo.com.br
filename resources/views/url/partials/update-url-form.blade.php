<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Url Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update this url information.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('url.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <input type="hidden" name="id" value="{{ $url->id }}">

        <div>
            <x-input-label for="name" :value="__('name')"/>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $url->name)" required autofocus autocomplete="name"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
        </div>

        <div>
            <x-input-label for="url" :value="__('url')" />
            <textarea id="url" name="url" type="text" rows="30" cols=""
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                required autocomplete="url">{{ old('url', $url->url) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('url')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'url-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
