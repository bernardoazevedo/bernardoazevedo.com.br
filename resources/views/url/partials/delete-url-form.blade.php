<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete url') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once this url is deleted, all of its resources and data will be permanently deleted. Before deleting this url, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-url-deletion')"
    >{{ __('Delete url') }}</x-danger-button>

    <x-modal name="confirm-url-deletion" :show="$errors->urlDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('url.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <input type="hidden" name="id" value="{{ $url->id }}">

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this url?') }}
            </h2>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete url') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
