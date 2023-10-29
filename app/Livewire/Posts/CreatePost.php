<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\Posts\CreateOrUpdatePostForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Post;

// #[Layout('layouts.app')]
#[Title('Create Post')]
class CreatePost extends Component
{
    public CreateOrUpdatePostForm $form;

    public function store()
    {
        Post::create($this->form->validate() + ['user_id' => auth()->id()]);

        // session()->flash('status', 'Post successfully created.');
        $this->dispatch('post-created', title: 'Post successfully created.')->to(ShowPosts::class);

        $this->redirect(route('posts.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.posts.create');
            // ->with('title', 'Create Post')
            // ->layout('layouts.app')
            // ->extends('layouts.app')
            // ->section('body')
            // ->title('Create Post');
    }
}
