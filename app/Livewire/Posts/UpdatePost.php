<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\Posts\CreateOrUpdatePostForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Post;

// #[Layout('layouts.app')]
#[Title('Update Post')]
class UpdatePost extends Component
{
    public Post $post;
    public CreateOrUpdatePostForm $form;

    public function mount()
    {
        $this->authorize('update-post', $this->post);

        $this->form->title = $this->post->title;
        $this->form->body  = $this->post->body;
    }

    public function update()
    {
        $this->authorize('update-post', $this->post);

        $this->post->update($this->form->validate());

        session()->flash('status', 'Post successfully updated.');

        $this->redirect(route('posts.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.posts.update');
            // ->with('title', 'Create Post')
            // ->layout('layouts.app')
            // ->extends('layouts.app')
            // ->section('body')
            // ->title('Create Post');
    }
}
