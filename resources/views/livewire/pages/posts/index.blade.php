<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('List Posts') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <x-alert></x-alert>
        <x-action-message class="mr-3" on="post-created">
            <div class="alert alert-success">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </x-action-message>
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <x-nav-link
                :newClass="true"
                class="btn btn-primary mb-4"
                role="button"
                href="{{ route('posts.create') }}"
                wire:navigate
            >Create Post</x-nav-link>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tilte</th>
                        <th scope="col">Body</th>
                        <th class="w-25" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr wire:key="{{ $post->id }}">
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                        <td>
                            <x-nav-link
                                :newClass="true"
                                class="btn btn-info"
                                role="button"
                                href="{{ route('posts.edit', ['post' => $post->id]) }}"
                                wire:navigate
                            >Edit Post</x-nav-link>
                            <x-nav-link
                                :newClass="true"
                                class="btn btn-danger"
                                role="button"
                                wire:click="destroy({{ $post->id }})"
                                wire:confirm="Are you sure you want to delete this post?"
                            >Delete Post</x-nav-link>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $posts->links() }}
        </div>
    </div>
</div>