<?php

namespace App\Livewire;

use App\Livewire\Forms\RecipeForm as FormsRecipeForm;
use App\Models\Item;
use App\Models\Recipe;
use Livewire\Attributes\Computed;
use Livewire\Component;

class RecipeForm extends Component
{

    public FormsRecipeForm $form;
    public $title = '';

    public Recipe $recipe;

    public function mount($recipe = null)
    {
        if ($recipe) {
            // Load the recipe for editing
            $this->recipe = Recipe::find($recipe->id);
            $this->title = 'Edit Recipe - ' . $this->recipe->name;
            $this->form->id = $this->recipe->id;
            $this->form->name = $this->recipe->name;
            $this->form->unit = $this->recipe->unit;
            $this->form->category = $this->recipe->category;
            $this->form->production_quantity = $this->recipe->production_quantity;
            foreach ($this->recipe->items as $item) {
                $this->form->ingredients[] = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'unit' => $item->unit,
                    'quantity' => $item->pivot->quantity,
                ];
            }
        } else {
            $this->title = 'New Recipe';
        }
    }


    #[Computed()]
    public function items()
    {
        return Item::query()
            ->get();
    }

    public function save()
    {
        $this->form->save();
        return $this->redirect(route('recipe.index'), navigate: true);
    }

    public function cancel()
    {
        // return redirect()->route('recipe.index')->navigate(true);
        return $this->redirect(route('recipe.index'), navigate: true);

    }


    public function render()
    {
        return view('livewire.recipe-form')->layout('layouts.app');;
    }
}
