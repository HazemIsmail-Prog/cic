<?php

namespace App\Livewire;

use App\Events\ItemsUpdatedEvent;
use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ItemIndex extends Component
{

    use WithPagination;

    public string $search = '';

    #[Computed()]
    #[On('echo:items,ItemsUpdatedEvent')]

    public function items()
    {
        return Item::query()
            ->when($this->search, function (Builder $q) {
                $q->whereAny(
                    [
                        'id',
                        'name',
                        'category',
                        'supplier',
                    ],
                    'LIKE',
                    "%" . $this->search . "%"
                );
            })
            ->paginate(9);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(Item $item)
    {
        $item->delete();
        broadcast(new ItemsUpdatedEvent($item));

    }

    public function render()
    {
        return view('livewire.item-index')->layout('layouts.app');
    }
}
