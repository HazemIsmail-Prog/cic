<?php

namespace App\Livewire;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class RecipeIndex extends Component
{

    use WithPagination;

    public string $search = '';

    #[Computed()]
    public function recipes()
    {
        return Recipe::query()
            ->when($this->search, function (Builder $q) {
                $q->whereAny(
                    [
                        'id',
                        'name',
                        'category',
                    ],
                    'LIKE',
                    "%" . $this->search . "%"
                );
            })
            ->selectRaw('recipes.*, (SELECT SUM(items.cost * item_recipe.quantity) 
                                  FROM items 
                                  INNER JOIN item_recipe 
                                  ON items.id = item_recipe.item_id 
                                  WHERE recipes.id = item_recipe.recipe_id) as total_cost')
            ->with('items')  // Eager load the items
            ->paginate(9);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(Recipe $recipe)
    {
        $recipe->delete();
    }

    public function render()
    {
        return view('livewire.recipe-index')->layout('layouts.app');
    }
}
