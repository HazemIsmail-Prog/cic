<?php

namespace App\Livewire\Forms;

use App\Models\Ingredient;
use App\Models\Recipe;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RecipeForm extends Form
{
    public $id;
    public string $code = '';
    public string $name = '';
    public string $unit = '';
    public string $category = '';
    public float $production_quantity = 0;
    public $ingredients = [];

    protected $rules = [
        'code' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'unit' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'production_quantity' => 'required|numeric|min:0',
        'ingredients' => 'required|array|min:1', // Make sure at least one ingredient is provided
        'ingredients.*.name' => 'required|string|max:255',
        'ingredients.*.quantity' => 'required|numeric|min:0', // Example rule for ingredient fields
    ];

    public function save()
    {
        $this->validate();

        $recipe = Recipe::updateOrCreate(['id' => $this->id], $this->except('ingredients'));

        // Prepare the ingredients with their quantities for the sync method
        $syncData = [];
        foreach ($this->ingredients as $ingredient) {
            $syncData[$ingredient['id']] = ['quantity' => $ingredient['quantity']];
        }

        // Sync the ingredients (this will delete old associations and attach new ones)
        $recipe->items()->sync($syncData);

        $this->reset();
    }
}
