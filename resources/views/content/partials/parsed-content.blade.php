<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Parsed Content') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Your content will be displayed like this:") }}
        </p>
    </header>

    <div id="htmlText" class="parsedown px-4 mb-8 flex flex-col gap-y-2 sm:w-auto md:w-1/2 text-gray-600 mt-6">
        {!! $content->text !!}
    </div>
</section>