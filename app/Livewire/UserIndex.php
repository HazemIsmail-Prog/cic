<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class UserIndex extends Component
{
    #[Computed()]
    public function users()
    {
        return User::query()
        ->get();
    }

    public function delete(User $user) {
        $user->delete();
    }

    public function render()
    {
        return view('livewire.user-index')->layout('layouts.app');
    }
}
