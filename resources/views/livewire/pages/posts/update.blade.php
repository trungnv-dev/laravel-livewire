<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Update Post') }}
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

                <form wire:submit="update" class="mt-6 space-y-6">
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input wire:model="form.title" id="title" type="text" class="mt-1 block w-full" required autofocus autocomplete="title" />
                        <x-input-error class="mt-2" :messages="$errors->get('form.title')" />
                    </div>

                    <div>
                        <x-input-label for="body" :value="__('Body')" />
                        <x-text-area wire:model="form.body" id="body" type="textarea" class="mt-1 block w-full" rows="8" required autocomplete="body" />
                        <x-input-error class="mt-2" :messages="$errors->get('form.body')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Update') }}</x-primary-button>

                        <x-action-message class="mr-3" on="post-updated">
                            {{ __('Updated.') }}
                        </x-action-message>
                    </div>
                </form>

                {{-- <livewire:pages.users.profile lazy /> --}}
            </div>
        </div>
    </div>
</div>
