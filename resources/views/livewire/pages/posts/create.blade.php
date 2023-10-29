<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Create Post') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-x2">
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Post Information') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __("Register post.") }}
                    </p>
                </header>

                <form wire:submit="store" class="mt-6 space-y-6">
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input
                            id="title" type="text"
                            class="mt-1 block w-full"
                            autocomplete="off"
                            wire:model="form.title" />
                        <x-input-error
                            class="mt-2"
                            :messages="$errors->get('form.title')" />
                    </div>

                    <div>
                        <x-input-label for="body" :value="__('Body')" />
                        <x-text-area
                            id="body" type="textarea"
                            class="mt-1 block w-full"
                            rows="8" autocomplete="off"
                            wire:model="form.body" />
                        <x-input-error
                            class="mt-2"
                            :messages="$errors->get('form.body')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Create') }}</x-primary-button>

                        <x-action-message class="mr-3" on="post-created">
                            {{ __('Created.') }}
                        </x-action-message>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
