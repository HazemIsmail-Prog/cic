<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public $id;
    public string $name = '';
    public string $email = '';
    public string $role = '';
    public string $password = '';

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $this->id],
            'role' => 'required|string|max:255',
            'password' => $this->id ? 'nullable|string|max:255' : 'required|string|max:255',
        ];
    }

    public function save()
    {
        $this->validate();

        if ($this->id) {
            User::updateOrCreate(['id' => $this->id], $this->except('password'));
        } else {
            User::updateOrCreate(['id' => $this->id], $this->all());
        }


        $this->reset();
    }
}
