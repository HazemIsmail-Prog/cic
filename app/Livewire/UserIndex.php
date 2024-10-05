<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{

    use WithPagination;

    public string $search = '';

    #[Computed()]
    public function users()
    {
        return User::query()
        ->when($this->search, function (Builder $q) {
            $q->whereAny(
                [
                    'name',
                    'email',
                    'role',
                ],
                'LIKE',
                "%" . $this->search . "%"
            );
        })
        ->paginate(9);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(User $user) {
        $user->delete();
    }

    public function render()
    {
        return view('livewire.user-index')->layout('layouts.app');
    }
}
