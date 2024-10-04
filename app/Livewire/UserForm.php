<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm as FormsUserForm;
use App\Models\User;
use Livewire\Component;

class UserForm extends Component
{
    public FormsUserForm $form;
    public $title = '';

    public User $user;

    public function mount($user = null)
    {
        if ($user) {
            // Load the user for editing
            $this->user = User::find($user->id);
            $this->title = 'Edit User - ' . $this->user->name;
            $this->form->id = $this->user->id;
            $this->form->name = $this->user->name;
            $this->form->email = $this->user->email;
            $this->form->role = $this->user->role;
        } else {
            $this->title = 'New User';
        }
    }

    public function save()
    {
        $this->form->save();
        return $this->redirect(route('user.index'), navigate: true);
    }

    public function cancel()
    {
        return $this->redirect(route('user.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.user-form')->layout('layouts.app');
    }
}
