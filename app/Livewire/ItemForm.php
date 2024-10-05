<?php

namespace App\Livewire;

use App\Livewire\Forms\ItemForm as FormsItemForm;
use App\Models\Item;
use Livewire\Component;

class ItemForm extends Component
{
    public FormsItemForm $form;
    public $title = '';

    public Item $item;

    public function mount($item = null)
    {
        if ($item) {
            // Load the item for editing
            $this->item = Item::find($item->id);
            $this->title = 'Edit Item - ' . $this->item->name;
            $this->form->id = $this->item->id;
            $this->form->name = $this->item->name;
            $this->form->unit = $this->item->unit;
            $this->form->cost = $this->item->cost;
            $this->form->supplier = $this->item->supplier;
            $this->form->category = $this->item->category;
        } else {
            $this->title = 'New Item';
        }
    }

    public function save()
    {
        $this->form->save();
        return $this->redirect(route('item.index'), navigate: true);
    }

    public function cancel()
    {
        return $this->redirect(route('item.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.item-form')->layout('layouts.app');
    }
}
