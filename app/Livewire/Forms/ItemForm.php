<?php

namespace App\Livewire\Forms;

use App\Events\ItemsUpdatedEvent;
use App\Models\Item;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ItemForm extends Form
{
    public $id;
    public string $name = '';
    public string $unit = '';
    public string $category = '';
    public string $supplier = '';
    public float $cost = 0;

    public function rules()
    {
        return  [
            'name' => ['required', 'string', 'max:255', 'unique:items,name,' . $this->id],
            'unit' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'supplier' => 'nullable|string|max:255',
            'cost' => 'required|numeric',
        ];
    }


    public function save()
    {
        $this->validate();

        $item = Item::updateOrCreate(['id' => $this->id], $this->all());

        broadcast(new ItemsUpdatedEvent($item));

        $this->reset();
    }
}
