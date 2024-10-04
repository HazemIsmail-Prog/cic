<?php

namespace App\Livewire\Forms;

use App\Models\Item;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ItemForm extends Form
{
    public $id;
    public string $code = '';
    public string $name = '';
    public string $unit = '';
    public string $category = '';
    public string $supplier = '';
    public float $cost = 0;

    protected $rules = [
        'code' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'unit' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'supplier' => 'nullable|string|max:255',
        'cost' => 'required|numeric',
    ];

    public function save()
    {
        $this->validate();

        Item::updateOrCreate(['id' => $this->id], $this->all());

        $this->reset();
    }
}
