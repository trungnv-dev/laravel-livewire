<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Renderless;

#[Title('Profile')]
class Profile extends Component
{
    public string $name = '';

    public string $email = '';

    public function mount()
    {
        $this->name  = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    #[Renderless]
    public function updateProfileInformation(): void
    {
        $user = auth()->user();

        $validated = $this->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // $this->js("alert('Post saved!')");

        $this->dispatch('profile-updated', name: $user->name);
    }

    public function sendVerification(): void
    {
        $user = auth()->user();

        if ($user->hasVerifiedEmail()) {
            $path = session('url.intended', RouteServiceProvider::HOME);

            $this->redirect($path);

            return;
        }

        $user->sendEmailVerificationNotification();

        session()->flash('status', 'verification-link-sent');
    }

    public function render()
    {
        return view('livewire.pages.users.profile');
    }
}
