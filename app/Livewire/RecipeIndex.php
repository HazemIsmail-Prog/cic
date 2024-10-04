<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Attributes\Computed;
use Livewire\Component;

class RecipeIndex extends Component
{

    #[Computed()]
    public function recipes()
    {
        return Recipe::query()
        ->with('items')
        ->get();
    }

    public function delete(Recipe $recipe) {
        $recipe->delete();
    }

    public function render()
    {
        return view('livewire.recipe-index')->layout('layouts.app');
    }
}
