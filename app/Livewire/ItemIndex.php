<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ItemIndex extends Component
{
    #[Computed()]
    public function items()
    {
        return Item::query()
        ->get();
    }

    public function delete(Item $item) {
        $item->delete();
    }

    public function render()
    {
        return view('livewire.item-index')->layout('layouts.app');
    }
}
