<?php

namespace App\Livewire\Posts;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Post;
use Illuminate\Http\Response;
use Livewire\WithPagination;

// #[Layout('layouts.app')]
#[Title('Posts')]
class ShowPosts extends Component
{
    use WithPagination;

    public function destroy(Post $post)
    {
        $this->authorize('update-post', $post);

        $post->delete();

        session()->flash('status', "Post {$post->id} successfully deleted.");

        $this->redirect(route('posts.index'), navigate: true);
    }

    public function render()
    {
        $posts = Post::where('user_id', auth()->id())
            ->orderByDesc('id')
            ->paginate(10);

        return view('livewire.pages.posts.index', compact('posts'));
            // ->with('title', 'Create Post')
            // ->layout('layouts.app')
            // ->extends('layouts.app')
            // ->section('body')
            // ->title('Create Post');
    }
}
