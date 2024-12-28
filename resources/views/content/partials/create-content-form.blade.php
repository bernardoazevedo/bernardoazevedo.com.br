<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Content Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update this content information.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('content.store') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" placeholder="Digite o título aqui" required autofocus/>
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="text" :value="__('Text')" />
            <textarea id="text" name="text" type="text" rows="30" cols="" 
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  mt-1 block w-full" 
                required autocomplete="text" placeholder="Digite o conteúdo aqui"></textarea>
            <x-input-error class="mt-2" :messages="$errors->get('text')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Create') }}</x-primary-button>

            @if (session('status') === 'content-created')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Created.') }}</p>
            @endif
        </div>
    </form>
</section>
